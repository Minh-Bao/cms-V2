<?php



namespace App\Http\Controllers\Site;

use Session;
use App\Slim;
use Response;
use Illuminate\Http\Request;
use App\Models\Site\Websitebloc;
use App\Models\Site\Websitepage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\WebsiteblocRequest;
use App\Repositories\WebsiteblocRepositoryInterface;
use App\Repositories\WebsitepageRepositoryInterface;


class WebsiteblocController extends Controller
{

    public function __construct(WebsitepageRepositoryInterface $page, WebsiteblocRepositoryInterface $bloc)
    {
        $this->bloc = $bloc;
        $this->page = $page;
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
     * 
     * @param \request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $websitepage = $this->page->findOrError($request->sitepages_id);
        $blocs = self::templateArray();

        return view('admin.site.websitebloc.create',compact('websitepage','blocs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \WebsiteblocRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebsiteblocRequest $request)
    {
        //Create a new bloc and add the sort number according to the precedent
        $bloc= $this->bloc->store($request);
        $sort = $this->nextBlocNumber($request->sitepages_id);
        $bloc->sort = $sort;
        $bloc->save();
        
        //Create a new image and save to storage
        $page = $this->page->findOrError($request->sitepages_id);
        Self::saveImg("image", $page, $bloc);

        Session::flash('success', 'Contenu modifié avec succès');  

        return redirect()->route('websitepage.edit', ['websitepage' => $bloc->sitepages_id]);
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
        $websitebloc = $this->bloc->findOrError($id); 
        $websiteblocs = $this->bloc->getWhereAndOrder('sitepages_id' ,$websitebloc->sitepages_id, 'sort', null); 
        $websitepage = $this->page->findOrError($websitebloc->sitepages_id);
        $blocs = self::templateArray();

        return view('admin.site.websitebloc.edit',compact('websitebloc','websitepage','websiteblocs','blocs'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request\WebsiteblocRequest  $request
     * @param  int  $id
     * @return view
     */
    public function update(WebsiteblocRequest $request, $id)
    {
        $bloc= $this->bloc->update($request, $id);
        $page = $this->page->findOrError($bloc->sitepages_id); 

        self::saveImg("image", $page, $bloc);        
        self::deleteImgIfCheck($request, $bloc);

        Session::flash('success', 'Contenu modifié avec succès');  

        return redirect()->route('websitebloc.edit', ['websitebloc' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $websiteblocs = $this->bloc->findorError($id);;
        self::removeImg($websiteblocs);

        $websiteblocs->delete();        

        Session::flash('success', 'Contenu supprimé avec succès');  

        return redirect()->route('websitepage.edit', ['websitepage' => $websiteblocs->sitepages_id]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clone($id)
    {
        $websitebloc = $this->bloc->findOrError($id);
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
     * ajax method to sort the bloc in the edit view
     *
     * @param Request $request
     * @return json array
     */
    public function sort(Request $request)
    {

        if($request->has('item')) {
            $i = 0;

            foreach($request->input('item') as $id) { 
                $i ++;
                $bloc = Websitebloc::find($id);
                $bloc->sort = $i;

                $bloc->save();
            }

            return Response::json(array('success' => true));

        } else {
            return Response::json(array('error' => true));
        }
    }

    /**
     * Return the next range number of a specified bloc
     *
     * @param int $id
     * @return int
     */
    public function nextBlocNumber($id){
        $bloc = $this->bloc->getWhereAndOrder('sitepages_id', $id, 'sort', 'desc')->first();        
        if (!is_null($bloc)) {
            return $bloc->sort + 1;
        } else {
            return 1;
        }
    }

    /**
     * Check all the template in the bloc folder then
     * Create an array with minimized bloc files name for the select
     *
     * @return Array
     */
    public static function templateArray(){
        $fileList = glob('../resources/views/site/themes/'.config('myconfig.site_theme').'/blocs/*.blade.php');
        $blocs=[]; 

        //iterate the array $filelist that glob returned
        foreach($fileList as $key=>$filename){
            //Simply print them out onto the screen without extension '.blade.php'
            $filename = str_replace('../resources/views/site/themes/'.config('myconfig.site_theme').'/blocs/', "", $filename);
            $filename = str_replace('.blade.php', "", $filename);
            //Create an array with the file and the same key name
            $blocs[$filename]=$filename;
        }

        return $blocs;
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
            $image  = array_shift($images);
            $name   = $page->slug."-bloc-".date('YmdHis').".jpg";
            $data   = $image['output']['data'];

            if (isset($data)) {
                $output = Slim::saveFile($data, $name , 'images/articles/'. date('Y') .'/'. date('m') .'/' , false);

                if(File::exists($old) && isset($bloc->image)) {
                    unlink($old);
                }

                $bloc->image = 'images/articles/'.date('Y').'/'.date('m').'/'.$name;
            }            
        }
        $bloc->save();
    }

    /**
     * remove image from storage and put field image to null when the checkbox is checked
     *
     * @param request $request
     * @param collection $bloc
     * @return void
     */
    public static function deleteImgIfCheck($request, $bloc){
        if($request->del_image==1) {
            unlink($bloc->image);
            $bloc->image = NULL;
        }
        $bloc->save();
    }

    /**
     * remove image of a specified object from storage
     *
     * @param collection $object
     * @return void
     */
    public static function removeImg($object){
        if(File::exists($object->image)) {
            unlink($object->image);
        }

    }
}

