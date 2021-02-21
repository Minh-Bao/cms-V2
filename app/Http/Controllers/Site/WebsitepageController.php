<?php

namespace App\Http\Controllers\Site;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Slim;
use App\Models\Site\Websitepage;
use App\Models\Site\Websitebloc;
use App\Models\Site\Slider;
use Session;



class WebsitepageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:');
    }  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websitepages = Websitepage::where('lng','fr')->orderBy('created_at', 'DESC')->get();

        return view('admin.site.websitepage.index',compact('websitepages'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $db_sliders = Slider::all();
        $sliders = array();

        foreach ($db_sliders as $slider) {
            $sliders[$slider->id] = strip_tags($slider->title);
        }

        $lng = App::getLocale();
        $websitepages = Websitepage::where('lng',$lng)->get();
        $db_websitepages_fr = Websitepage::where('lng','fr')->orderBy('title')->get();

        foreach($db_websitepages_fr as $websitepage_fr) {
            $websitepages_fr[ $websitepage_fr->id] = $websitepage_fr->title.' ('. $websitepage_fr->slug .')';         
        }

        return view('admin.site.websitepage.create',compact('sliders','lng','websitepages_fr'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [

            'name'             => 'required|min:2|max:200',
            'slug'             => 'required|unique:sitepages|min:2|max:150',
            'title'            => 'required|min:2|max:200',
            'alt_img'          => 'required|min:2|max:200',
            'title_img'        => 'required|min:2|max:200',            
            'meta_title'        => 'required|min:2|max:75',
            'meta_desc'         => 'required|min:2|max:200',
        ];

        $customMessages = ['unique' => 'Ce slug existe déjà.'];

        $this->validate($request,$rules,$customMessages);

        $page = new Websitepage();

        $page->lng              = "fr";
        $page->name             = $request->name;
        $page->title            = $request->title;
        $page->slug             = $request->slug;
        $page->alt_img          = $request->alt_img;
        $page->title_img        = $request->title_img;
        $page->meta_title       = $request->meta_title;
        $page->meta_desc        = $request->meta_desc;
        $page->paginate         = $request->paginate;
        $page->last_review        = $request->last_review;

        $page->author           = auth()->user()->name;

        $page->content          = $request->content;
        $page->slider_id        = $request->slider_id;
        $page->translate_id     = $request->translate_id;

        $year   = date('Y');
        $month  = date('m');

        self::saveImg('image', $page, $year, $month);

        $thumbnail = Slim::getImages('thumbnail');
        
        if ($thumbnail != []) {
            $old_thumb   = $page->thumbnail;
            $thumbnail  = array_shift($thumbnail);
            $name_thumb   = $page->slug."-thumbnail-".date('YmdHis').".jpg";
            $data_thumb   = $thumbnail['output']['data'];            

            if (isset($thumbnail['output']['data'])) {
                $output = Slim::saveFile($data_thumb, $name_thumb , 'images/articles/'. $year .'/'. $month .'/' , false);

                if(File::exists($old_thumb) && isset($page->thumbnail)) {
                    unlink($old_thumb);
                }

                $page->thumbnail = 'images/articles/'.date('Y').'/'.date('m').'/'.$name_thumb;
            }
        } 

        //set the status of the page
        if($request->action == 'Brouillon'){
            $page->status = 0;
        }elseif($request->action == 'Enregistrer'){
            $page->status = 1;            
        }elseif($request->action == 'Programmer'){
            $page->status = 2;
            $page->schedul = now()->addHour(1);
            $page->save();
            Session::flash('success', 'Veuillez programmer une date'); 

            return redirect()->route('websitepage.index');
        }

        $page->save();

        return back()->withInput(); 
    }

    /**
     * Get image from input and save in database and public folder
     *
     * @param string $input
     * @param Illuminate\Support\Collection  $page
     * @param date $year
     * @param date $month
     */
    public static function saveImg($input, $page, $year, $month) {
        $images = Slim::getImages($input);

        if ($images != []) {
            $old    = $page->image;
            $image  = array_shift($images);
            $name   = $page->slug."-".date('YmdHis').".jpg";
            $data   = $image['output']['data'];            

            if (isset($data)) {
                $output = Slim::saveFile($data, $name , 'images/articles/'. $year .'/'. $month .'/' , false);

                if(File::exists($old) && isset($page->image)) {
                    unlink($old);
                }

                $page->image = 'images/articles/'.date('Y').'/'.date('m').'/'.$name;
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
        //.....
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
            $websitepage  = Websitepage::findOrFail($id);
        }
        catch(ModelNotFoundException $err){
            Session::flash('error', 'Fiche introuvable.');

            return redirect()->route('websitepage.index');
        }

        $db_sliders = Slider::all();
        $sliders = array();

        foreach ($db_sliders as $slider) {
            $sliders[$slider->id] = strip_tags($slider->title);
        }

        $blocs = Websitebloc::where('sitepages_id',$id)->orderBy('sort')->get();
        $lng = App::getLocale();
        $websitepages = Websitepage::where('lng','fr')->get();
        $db_websitepages_fr = Websitepage::where('lng','fr')->orderBy('title')->get();

        foreach($db_websitepages_fr as $websitepage_fr) {
            $websitepages_fr[ $websitepage_fr->id] = $websitepage_fr->title.' ('. $websitepage_fr->slug .')';            

        }

        return view('admin.site.websitepage.edit',compact('websitepage','sliders','blocs','websitepages','websitepages_fr'));

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
        
        $rules = [
            'name'             => 'required|min:2|max:200',
            'title'            => 'required|min:2|max:200',
            'alt_img'          => 'required|min:2|max:200',
            'title_img'        => 'required|min:2|max:200',            
            'meta_title'        => 'required|min:2|max:75',
            'meta_desc'         => 'required|min:2|max:200',
        ];

        $page = Websitepage::findOrFail($id);

        $page->name             = $request->name;
        $page->lng              = "fr";
        $page->title            = $request->title;
        $page->slug             = $request->slug;
        $page->alt_img          = $request->alt_img;
        $page->title_img        = $request->title_img;
        $page->meta_title       = $request->meta_title;
        $page->meta_desc        = $request->meta_desc;
        $page->paginate         = $request->paginate;
        $page->last_review        = $request->last_review;

        $page->content          = $request->content;
        $page->slider_id        = $request->slider_id;
        $page->translate_id     = $request->translate_id;


        if ($page->slug==$request->slug) {
            // Meme slug
        } else {
            $rules = ['slug' => 'required|unique:sitepages|min:2|max:150'];
            $customMessages = ['unique' => 'Ce slug existe déjà.'];

            $this->validate($request, $rules, $customMessages);
        }

        $page->slider_id = $request->slider_id;
        $page->translate_id = $request->translate_id;

        $year   = date('Y');
        $month  = date('m');

        self::saveImg('image', $page, $year, $month);

        $thumbnail = Slim::getImages('thumbnail');
        
        if ($thumbnail != []) {
            $old_thumb   = $page->thumbnail;
            $thumbnail  = array_shift($thumbnail);
            $name_thumb   = $page->slug."-thumbnail-".date('YmdHis').".jpg";
            $data_thumb   = $thumbnail['output']['data'];            

            if (isset($thumbnail['output']['data'])) {
                $output = Slim::saveFile($data_thumb, $name_thumb , 'images/articles/'. $year .'/'. $month .'/' , false);

                if(File::exists($old_thumb) && isset($page->thumbnail)) {
                    unlink($old_thumb);
                }

                $page->thumbnail = 'images/articles/'.date('Y').'/'.date('m').'/'.$name_thumb;
            }
        } 

        //set the status of the page
        if($request->action == 'Brouillon'){
            $page->status = 0;
        }elseif($request->action == 'Enregistrer'){
            $page->status = 1;            
        }elseif($request->action == 'Programmer'){
            $page->status = 2;
            $page->schedul = now()->addHour(1);
            $page->save();
            Session::flash('success', 'Veuillez programmer une date'); 

            return redirect()->route('websitepage.index');
        }


        $page->save();
        
        Session::flash('success', 'Contenu modifié avec succès'); 

        return back()->withInput(); 
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Websitepage::findOrfail($id);
        $bloc = Websitebloc::select('*')->whereSitepages_id($id);

        if(File::exists($page->image) && File::exists($page->thumbnail)) {
            unlink($page->image);
            unlink($page->thumbnail);
        }

        $blocs = $bloc->get();
        foreach($blocs as $item){
            if(File::exists($item->image)) {
                unlink($item->image);
            }  
        }              

        $page->delete();
        $bloc->delete();

        Session::flash('success', 'Votre page a bien été supprimée'); 

        return back();
    }

    /**
     * check if the schudeled date passed or is now
     * And change status for specified page
     * 
     * @return void
     */
    public function checkDate(){
        $page = Websitepage::whereStatus(2)->get();
        if($page){
            foreach($page as $item){
                if(now() >= $item->schedul){
                    $item->status = 1;
                    $item->created_at = $item->schedul;
                    $item->save();
                }
            }
        }
    }

    /**
     * Set the scheduled date for the specified page
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * 
     * @return void
     */
    public function setDate(Request $request, $id){
        $page = Websitepage::findOrFail($id);
        $page->schedul = $request->date;
        $page->status = 2;
        $page->save();

        Session::flash('success', 'Votre publication a bien été programmée'); 

        return back();
    }
}

