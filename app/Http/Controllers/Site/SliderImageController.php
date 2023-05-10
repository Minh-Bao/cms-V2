<?php

namespace App\Http\Controllers\Site;

use Session;
use App\Slim;
use Response;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Site\SliderImage;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SliderImageRequest;
use App\Repositories\SliderRepositoryInterface;
use App\Repositories\SliderImageRepositoryInterface;

class SliderImageController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private SliderImageRepositoryInterface $sliderImage,private SliderRepositoryInterface $slider)
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

    /**
     * Show the form to edit slider image
     *
     * @param int $id
     * @return view
     */
    public function edit($id)
    {
        $slide = $this->sliderImage->findBy($id);
        $slider = $this->slider->findBy($slide->sitesliders_id);
        $pictures = $this->sliderImage->getWhereAndOrder('sitesliders_id', $slide->sitesliders_id, 'sort', null);

        return view('admin.site.sliderimage.edit', compact('slide', 'slider', 'pictures'));
    }


    /**
     * Update the specified resource in db
     *
     * @param SliderImageRequest $request
     * @param int $id
     * @return view
     */
    public function update(SliderImageRequest $request, $id)
    {
        $picture =$this->sliderImage->findBy($id);
        $oldimage = $picture->picture;
        $sitesliders_id = $picture->sitesliders_id;

        $name = self::saveImg('slim', $sitesliders_id);

        $picture->picture = 'images/sliders/' . $sitesliders_id . '/' . $name;
        $picture->title = $request->title;
        $picture->content = $request->content;
        $picture->save();

        File::delete(public_path($oldimage));

        Session::flash('success', 'Slider modifié');
        return Redirect::to(URL::previous());
    }

    /**
     * Store a newly created resource in db
     *
     * @param SliderImageRequest $request
     * @return view
     */
    public function store(SliderImageRequest $request)
    {
        $name = self::saveImg('slide', $request); 

        $nb_pictures = $this->sliderImage->getFieldWhere('sort', 'sitesliders_id', $request->sitesliders_id)->count();        

        $this->sliderImage->store($request,  $name, $nb_pictures);

        Session::flash('success', 'Image ajoutée au slider');

        return Redirect::to(URL::previous());
    }

    /**
     * Delete specified sliderimage from db
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $picture = $this->sliderImage->findOrError($id);
        File::delete(public_path('images/sliders/' . $picture->sitesliders_id . '/' . $picture->file));
        $picture->delete();

        Session::flash('success', 'Slider supprimé avec succès');

        return Redirect::to(URL::previous());
    }

    /**
     * save the picture in specified order
     * according to the sort
     *
     * @param Request $request
     * @return response
     */
    public function sort(Request $request)
    {
        if ($request->has('item')) {
            $i = 0;

            foreach ($request->input('item') as $id) {
                $i++;
                $item = SliderImage::find($id);
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

    /**
     * Retrive frolm input the image and
     * Save image to storage
     *
     * @param string $img
     * @param mixed $id
     * @return void or view
     */
    public static function saveImg($img, $id){
        $images = Slim::getImages($img);
        
        if ($images === false) {
            Slim::outputJSON(array(
                'status' => SlimStatus::FAILURE,
                'message' => 'No data posted'
            ));
            return;
        }
        
        $image = array_shift($images);
        
        if($img == "slim"){
            $name = date('Ymdhis') . ".jpg";
        }else{
            $name = Str::slug($id->title, '-') . "-" . date('Ymdhis') . ".jpg";
        }

        $data = $image['output']['data'];

        if (isset($image['output']['data'])) {
            if($img == "slim"){
                Slim::saveFile($data, $name, 'images/sliders/' . $id . "/", false);
            }else{
                Slim::saveFile($data, $name, 'images/sliders/' . $id->sitesliders_id . "/", false);
            }
            return $name;
        } else {
            Session::flash('error', 'Veuillez attendre que l\image soit prête');
            return back();
        }
    }

}
