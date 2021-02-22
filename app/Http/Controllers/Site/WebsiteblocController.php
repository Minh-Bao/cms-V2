<?php



namespace App\Http\Controllers\Site;



use Input;
use Session;
use App\Slim;
use Response;
use App\Models\Site\Websitebloc;
use App\Models\Site\Websitepage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class WebsiteblocController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     * Create an array with minimized bloc files name for the select
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sitepages_id = $_REQUEST["sitepages_id"];
        $websitepage = Websitepage::findOrFail($sitepages_id);
        //Check all the template in the bloc folder and put them in an array
        $fileList = glob('../resources/views/site/themes/'.env('SITE_THEME').'/blocs/*.blade.php');
        $blocs=[]; 

        //iterate the array $filelist that glob returned
        foreach($fileList as $key=>$filename){
            //Simply print them out onto the screen without extension '.blade.php'
            $filename = str_replace('../resources/views/site/themes/'.env('SITE_THEME').'/blocs/', "", $filename);
            $filename = str_replace('.blade.php', "", $filename);
            //Create an array with the file and the same key name
            $blocs[$filename]=$filename;
        }

        return view('admin.site.websitebloc.create',compact('websitepage','blocs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = Websitepage::find($request->sitepages_id);
        $bloc = Websitebloc::select('*')->where('sitepages_id',$request->sitepages_id)->orderBy('sort','desc')->first();

        if (!is_null($bloc)) {
            $sort = $bloc->sort + 1;

        } else {
            $sort = 1;
        }

        $bloc = new Websitebloc();
        
        $bloc->sitepages_id     = $request->sitepages_id;
        $bloc->title            = $request->title;
        $bloc->alt_img          = $request->alt_img;
        $bloc->title_img        = $request->title_img;
        $bloc->sort             = $sort;
        $bloc->content          = $request->content;
        $bloc->format           = $request->format;
       
        Self::saveImg("image", $page, $bloc);

        $bloc->save();
        

        Session::flash('success', 'Contenu modifié avec succès');  

        return redirect()->route('websitepage.edit', ['id' => $bloc->sitepages_id]);
    }

    /**
     * Get image from input and save in database and public folder
     *
     * @param string $input
     * @param Illuminate\Support\Collection  $page
     * @param Illuminate\Support\Collection  $bloc
     */
    public static function saveImg($input, $page, $bloc) {
        $images = Slim::getImages($input);
        
        if ($images != []) {
            $old    = $bloc->image;
            $year   = date('Y');
            $month  = date('m');
            $image  = array_shift($images);
            $name   = $page->slug."-bloc-".date('YmdHis').".jpg";
            $data   = $image['output']['data'];

            if (isset($data)) {
                $output = Slim::saveFile($data, $name , 'images/articles/'. $year .'/'. $month .'/' , false);

                if(File::exists($old) && isset($bloc->image)) {
                    unlink($old);
                }

                $bloc->image = 'images/articles/'.date('Y').'/'.date('m').'/'.$name;
            }            
        } 
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $websitebloc  = Websitebloc::findOrFail($id);
        }
        catch(ModelNotFoundException $err){
            Session::flash('error', 'Bloc introuvable.');  

            return redirect()->route('websitepage.index');

            exit;
        }

        $websiteblocs = Websitebloc::where('sitepages_id',$websitebloc->sitepages_id)->orderBy('sort')->get();

        try{
            $websitepage  = Websitepage::findOrFail($websitebloc->sitepages_id);
        }
        catch(ModelNotFoundException $err){
            Session::flash('error', 'Page du bloc introuvable.');  

            return redirect()->route('websitepage.index');

            exit;
        }

        $directory  = base_path('resources\views\site\themes\cms\blocs');
        $fileList   = glob('../resources/views/site/themes/'.env('SITE_THEME').'/blocs/*.blade.php');
        $blocs=[];        
        // $groups=[];

        //Loop through the array that glob returned.
        foreach($fileList as $key=>$filename){
            

           //Simply print them out onto the screen.
            $filename = str_replace('../resources/views/site/themes/'.env('SITE_THEME').'/blocs/', "", $filename);
            $filename = str_replace('.blade.php', "", $filename);
            
            $blocs[$filename]=$filename;

            //for futur implementation
            /* $namebloc = preg_match_all( '/bloc/', $filename, $out, PREG_PATTERN_ORDER);
            $namegroup = preg_match_all( '/group/', $filename, $out, PREG_PATTERN_ORDER);

            if($namebloc){
                $blocs[$filename]=$filename;
            }elseif($namegroup){
                $groups[$filename]=$filename;
            } */
            
        }

        return view('admin.site.websitebloc.edit',compact('websitebloc','websitepage','websiteblocs','blocs'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $bloc = Websitebloc::find($id);
        $page = Websitepage::find($bloc->sitepages_id);

        $bloc->title            = $request->title;
        $bloc->alt_img          = $request->alt_img;
        $bloc->title_img        = $request->title_img;
        $bloc->format           = $request->format;
        $bloc->content          = $request->content;
        $bloc->content_two      = $request->content_two;

        Self::saveImg("image", $page, $bloc);        

        if($request->del_image==1) {
            unlink($bloc->image);
            $bloc->image = NULL;
        }

        $bloc->save();

        Session::flash('success', 'Contenu modifié avec succès');  

        return redirect()->route('websitebloc.edit', ['id' => $id]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clone($id)
    {
        try{
            $websitebloc  = Websitebloc::findOrFail($id);
        }
        catch(ModelNotFoundException $err){
            Session::flash('error', 'Bloc introuvable.');  

            return redirect()->route('websitepage.index');

            exit;
        }

        $newWebsitebloc = $websitebloc->replicate();
        $newWebsitebloc->save();

        Session::flash('success', 'Contenu cloné avec succès');  

        return redirect()->route('websitepage.edit', ['id' => $websitebloc->sitepages_id]);
    }


    public function getByLang($id)
    {
        $page       = Websitepage::find($id);
        $page_fr    = Websitepage::find($page->translate_id);
        $blocs      = Websitebloc::where('sitepages_id',$page_fr->id)->get();

        foreach($blocs as $bloc) {

            // On clone le bloc
            $newbloc = new Websitebloc();

            $newbloc->sitepages_id      = $id; // L'id de la page de la langue
            $newbloc->sitesliders_id    = $bloc->sitesliders_id;
            $newbloc->title             = $bloc->title;
            $newbloc->content           = $bloc->content;
            $newbloc->content_hidden    = $bloc->content_hidden;
            $newbloc->image             = $bloc->image;
            $newbloc->title_image       = $bloc->title_image;
            $newbloc->url_image         = $bloc->url_image;
            $newbloc->email             = $bloc->email;
            $newbloc->format            = $bloc->format;
            $newbloc->sort              = $bloc->sort;

            $newbloc->save();          
        }

        Session::flash('success', 'Bloc dupliqués avec succès');  

        return redirect()->route('websitepage.edit', ['id' => $id]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $websitebloc = Websitebloc::where('id', $id)->first();

        if(File::exists($websitebloc->image)) {
            unlink($websitebloc->image);
        }

        $websitebloc->delete();        

        Session::flash('success', 'Contenu supprimé avec succès');  

        return redirect()->route('websitepage.edit', ['id' => $websitebloc->sitepages_id]);
    }

    public function sort(Request $request)
    {
        if(Input::has('item')) {
            $i = 0;

            foreach(Input::get('item') as $id) {
                $i ++;
                $bloc = Websitebloc::find($id);
                $bloc->sort = $i;

                $bloc->save();
            }

            return Response::json(array('success' => true));

        } else {
            return Response::json(array('success' => false));
        }
    }
}

