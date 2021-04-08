<?php

namespace App\Http\Controllers\Site;

use Session;
use App\Slim;
use Illuminate\Http\Request;
use App\Models\Site\Websitepage;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\File;
use App\Http\Requests\WebsitepageRequest;
use App\Repositories\SliderRepositoryInterface;
use App\Repositories\WebsiteblocRepositoryInterface;
use App\Repositories\WebsitepageRepositoryInterface;



class WebsitepageController extends Controller
{

    public function __construct(WebsitepageRepositoryInterface $page, SliderRepositoryInterface $slider, WebsiteblocRepositoryInterface $bloc)
    {
        $this->middleware('auth:');
        $this->page = $page;
        $this->slider = $slider;
        $this->bloc = $bloc;
    }  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SiteController $site)
    {
        $websitepages = $this->page->allOrderedBy('created_at', 'DESC')->where('lng','fr')->simplePaginate(10);
        $bestpage = $site->bestpage(["contact", "mentions", "homepage", "article-index", "categorie"]);

        //Add random color to each article
        foreach($bestpage as $item){
            $item->color = substr(md5(rand()), 0, 6);
        }

        return view('admin.site.websitepage.index',compact('websitepages', 'bestpage'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $sliders = $this->slider->getAllInArray();

        return view('admin.site.websitepage.create',compact('sliders'));      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \WebsitepageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebsitepageRequest $request)
    {
        $page = $this->page->store($request);

        self::saveImg('image', $page);
        self::saveImg('thumbnail', $page);

        self::setStatus($request, $page);

        return back()->withInput(); 
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
        $websitepage = $this->page->findOrError($id);
        $sliders = $this->slider->getAllInArray();
        $blocs = $this->bloc->getWhereAndOrder('sitepages_id', $id, 'sort', null);
        $websitepages = $this->page->WhereAndOrder('lng', 'fr', 'title', null)->paginate(10);
        $websitepages_fr = $this->page->arrayWhereLang('fr');

        return view('admin.site.websitepage.edit',compact('websitepage','sliders','blocs','websitepages','websitepages_fr'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebsitepageRequest $request, $id)
    {
        $this->page->update($request, $id); 
        $page =$this->page->findOrError($id);       
        
        self::saveImg('image', $page);
        self::saveImg('thumbnail', $page);

        self::setStatus($request, $page);

        if($request->action =="Programmer"){
            return redirect()->route('websitepage.index');
        }else{
            return back()->withInput();  
        }

    }



    /**
     * Remove the specified page resource from storage., 
     * remove image if exist in storage 
     * and remove corresponding bloc and images blocsa
     *
     * @param  int  $id
     * @return view
     */
    public function destroy($id)
    {
        $page = $this->page->findOrError($id);
        $bloc = $this->bloc->getByPage_id($id);

        self::deleteImg($page->image);
        self::deleteImg($page->thumbnail);

        $blocs = $bloc->get();
        foreach($blocs as $item){
            self::deleteImg($item->image);
        }              

        $page->delete();
        $bloc->delete();

        Session::flash('success', 'Votre page a bien été supprimée'); 

        return back();
    }

    /**
     * Unlink image if exist
     *
     * @param object $object
     * @return void
     */
    public static function deleteImg(object $object) :void{
        if(File::exists($object)) {
            unlink($object);
        }
    }

    /**
     * check if the schudeled date has passed or is now
     * And change status for specified page
     * 
     * @return void
     */
    public function checkDate(){
        $page = Websitepage::whereStatus(2)->get();
        if(isset($page)){
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
     * Set a scheduled date for the specified page
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * 
     * @return view
     */
    public function setDate(Request $request, $id){
        $page = Websitepage::findOrFail($id);
        $page->schedul = $request->date;
        $page->status = 2;
        $page->save();

        Session::flash('success', 'Votre publication a bien été programmée'); 

        return back();
    }

    /**
     * set the status of the page according to condition
     *
     * @param \request $request
     * @param \collection $page
     * @return void
     */
    public static function setStatus($request, $page){

        switch ($request->action) {
            case 'Brouillon':
                $page->status = 0;
                Session::flash('success', 'Brouillon enregistré avec succès'); 

                break;
            case 'Enregistrer':
                $page->status = 1; 
                Session::flash('success', 'Page enregistrée avec succès'); 
    
                break;
            case 'Programmer':
                $page->status = 2;
                $page->schedul = now()->addHour(1);
                $page->save();

                Session::flash('success', 'Veuillez programmer une date'); 
        }

        $page->save();
    }

    /**
     * Get image or thumbnail from input and save in database and public folder
     *
     * @param string $input
     * @param Illuminate\Support\Collection  $page
     * @param date $year
     * @param date $month
     */
    public static function saveImg($input, $page) {

        $images = Slim::getImages($input);

        if ($images != []) {
            if($input == 'image'){
                $old    = $page->image;
                $name   = $page->slug."-".date('YmdHis').".jpg";
            }else{
                $old    = $page->thumbnail;
                $name   = $page->slug."-thumbnail-".date('YmdHis').".jpg";
            }
            $image  = array_shift($images);
            $data   = $image['output']['data'];            

            if (isset($data)) {
                Slim::saveFile($data, $name , 'images/articles/'. date('Y') .'/'. date('m') .'/' , false);

                if(File::exists($old) && isset($page->image)) {
                    unlink($old);
                }

                if($input == 'image'){
                    $page->image = 'images/articles/'.date('Y').'/'.date('m').'/'.$name;
                }else{
                    $page->thumbnail = 'images/articles/'.date('Y').'/'.date('m').'/'.$name;
                }
            }
        } 
    }

}

