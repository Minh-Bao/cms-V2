<?php



namespace App\Http\Controllers\Site;



use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Site\Slider;
use App\Site\Sliderimage;
use App\Slim;
use Session;
use Input;
use Image;
use Auth;
use Response;



class SliderimageController extends Controller

{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function edit($id)
    {
        $slide = Sliderimage::find($id);
        $slider = Slider::find($slide->sitesliders_id);
        //$pictures = DB::select('select * from siteslidersimages where sitesliders_id = ? order by sort', [$slide->sitesliders_id]);
        $pictures = DB::table('siteslidersimages')->where('sitesliders_id', $slide->sitesliders_id)->orderBy('sort')->get();

        return view('admin.site.sliderimage.edit', compact('slide', 'slider', 'pictures'));
    }



    public function update(Request $request, $id)
    {
        $picture = Sliderimage::find($id);
        $oldimage = $picture->file;
        $sitesliders_id = $picture->sitesliders_id;

        $this->validate($request, [
            'title'         => 'required|min:2|max:150'
        ]);

        $images = Slim::getImages('slim');
        
        if ($images === false) {
            Slim::outputJSON(array(
                'status' => SlimStatus::FAILURE,
                'message' => 'No data posted'
            ));

            return;
        }



        $image = array_shift($images);
        
        $name = date('Ymdhis') . ".jpg";
        $data = $image['output']['data'];

        if (isset($image['output']['data'])) {
            $output = Slim::saveFile($data, $name, 'images/sliders/' . $sitesliders_id . "/", false);
        } else {
            Session::flash('error', 'Veuillez attendre que l\image soit prête');
            return Redirect::to(URL::previous());
        }

        $picture->picture = 'images/sliders/' . $sitesliders_id . '/' . $name;
        $picture->title = $request->title;
        $picture->content = $request->content;
        $picture->save();

        File::delete(public_path($oldimage));
        Session::flash('success', 'Slider modifié');
        return Redirect::to(URL::previous());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sitesliders_id' => 'required|integer',
            'title'          => 'required|min:2|max:150'
        ]);

        $images = Slim::getImages('slide');
        $image = array_shift($images);
        $name = str_slug($request->title, '-') . "-" . date('Ymdhis') . ".jpg";
        $data = $image['output']['data'];

        if (isset($image['output']['data'])) {
            $output = Slim::saveFile($data, $name, 'images/sliders/' . $request->sitesliders_id . "/", false);
        } else {
            Session::flash('error', 'Veuillez attendre que l\image soit prête');
            return Redirect::to(URL::previous());
        }

        $nb_pictures = Sliderimage::select('sort')->whereSitesliders_id($request->sitesliders_id)->count();

        $picture = new Sliderimage;

        $picture->sitesliders_id = $request->sitesliders_id;
        $picture->picture = 'images/sliders/' . $request->sitesliders_id . '/' . $name;
        $picture->title = $request->title;
        $picture->content = $request->content;
        $picture->sort = $nb_pictures + 1;
        $picture->status = "on";
        $picture->save();

        Session::flash('success', 'Image ajoutée au slider');

        return Redirect::to(URL::previous());
    }

    public function sort(Request $request)
    {
        if (Input::has('item')) {
            $i = 0;

            foreach (Input::get('item') as $id) {
                $i++;
                $item = Sliderimage::find($id);
                $item->sort = $i;
                $item->save();
            }

            return Response::json(array('success' => true));
        } else {
            return Response::json(array('success' => false));
        }
    }

    public function show($id)
    {
        //
    }

    public function delete($id)
    {
        $picture = Sliderimage::find($id);
        Sliderimage::where('id', $id)->delete();
        File::delete(public_path('images/sliders/' . $picture->sitesliders_id . '/' . $picture->file));
        Session::flash('success', 'Slider supprimé avec succès');

        return Redirect::to(URL::previous());
    }
}
