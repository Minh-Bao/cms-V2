<?php

namespace App\Http\Controllers\Site;

use Session;
use App\Slim;
use App\Models\Site\Slider;
use Illuminate\Http\Request;
use App\Models\Site\Websitebloc;
use App\Models\Site\Websitepage;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\WebsitepageRequest;
use App\Repositories\SliderRepositoryInterface;
use App\Repositories\WebsiteblocRepositoryInterface;
use App\Repositories\WebsitepageRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;



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
    public function index()
    {
        $websitepages = $this->page->AllOrderedBy('created_at', 'DESC')->where('lng','fr');

        return view('admin.site.websitepage.index',compact('websitepages'));
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

        Session::flash('success', 'Contenu enregistré avec succès'); 

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
        $websitepages = $this->page->getWhere('lng', 'fr');
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

        $page =$this->page->findOrError($id);       
        $this->page->update($request, $id); 
        
        self::saveImg('image', $page);
        self::saveImg('thumbnail', $page);

        self::setStatus($request, $page);
        
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
        $page = $this->page->findOrError($id);
        $bloc = $this->bloc->getByPage_id($id);

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
