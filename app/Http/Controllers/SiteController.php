<?php

namespace App\Http\Controllers;

use App\Models\Site\Websitepage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Repositories\SliderRepositoryInterface;
use App\Http\Controllers\Site\WebsitepageController;
use App\Repositories\SliderImageRepositoryInterface;
use App\Repositories\WebsiteblocRepositoryInterface;
use App\Repositories\WebsitepageRepositoryInterface;


class SiteController extends Controller
{
    private $exclude_pages = [];  //An array of all forbidden pages 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WebsitepageRepositoryInterface $page, SliderRepositoryInterface $slider, SliderImageRepositoryInterface $sliderImage, WebsiteblocRepositoryInterface $bloc)
    {
        $this->bloc = $bloc;
        $this->sliderImage = $sliderImage;
        $this->slider = $slider;
        $this->page = $page;
        $this->exclude_pages = ["contact", "mentions", "homepage", "article-index", "categorie"];
    }

    /**
     * Show the main page of, the application.
     * 
     * @param  \WebsitepageController  $website
     * @return \Illuminate\Contracts\view
     */
    public function index(WebsitepageController $website)
    {  
        //Check if scheduled date page is passed or is now, then update status
        $website->checkDate();

        /*Declare a array of all the variable used in the view */
        $arrayView = array('sitepage','slider','sitesliderimages','siteblocs'/* ,'menus' */);

        /*check if the page exist assign to variable if not throw error*/
        $sitepage = $this->page->getWhere('slug','homepage')->where('status', 1)->first();
        /*Check if there is slider and image assign to variable*/
        $slider = $this->slider->findBy($sitepage->slider_id);
        $sitesliderimages = $this->sliderImage->getWhereAndOrder('sitesliders_id',$sitepage->slider_id,'sort', null);
        /*Check if there is a bloc and assign to variable*/
        $siteblocs = $this->bloc->getWhereAndOrder('sitepages_id', $sitepage->id,'sort', null);
        
        
        /*BestPage and thumbnail module for group-home*/
        $bestpage = $this->bestpage($this->exclude_pages);       
        $page = $this->thumbnail($this->exclude_pages);
                
        array_push($arrayView, 'page', 'bestpage');  
        
        /* if($sitepage->model=="onepage") {
            $menus = Websitebloc::select('*')->where('format','like','%title%')->where('sitepages_id',$sitepage->id)->orderBy('sort')->get();
        } */

        return view('site.themes.cms.page',compact($arrayView));
    }    


    /**
     * Show page or preview rendered with choosen blocs and options
     *
     * @param int $type preview or classic page
     * @param string $slug
     * 
     * @return \Illuminate\Contracts\view
     */
    public function page( $type,$slug)
    {
        /*Declare an array of all the variable used in the view */
         $arrayView = array('sitepage','slider','sitesliderimages','siteblocs'/* ,'menus' */);

        /*check if the page exist assign to variable if not throw error*/
            /*Also check if the page is a preview or classic page */
        if($type == "page"){
            $sitepage = $this->page->getWhere('slug',$slug)->where('status', 1)->firstOrFail();
        }elseif($type == "preview"){
            $sitepage = $this->page->getWhere('slug',$slug)->firstOrFail();
        }         
        /*Check if there is slider and image assign to variable*/
        $slider = $this->slider->findBy($sitepage->slider_id);
        $sitesliderimages = $this->sliderImage->getWhereAndOrder('sitesliders_id',$sitepage->slider_id,'sort', null);

        /*increment view page number except exclude pages*/
        if($sitepage->status == 1){
            if( !(in_array($sitepage->slug, $this->exclude_pages)) ){
                $sitepage->count = $sitepage->count + 1;
                $sitepage->save();
            }
        }

        //////////////////////CHECKBOX///////////////////////
        /*Check if the checkbox for pagination is on then  assign returned object to a variable*/
        if($sitepage->paginate == "on"){
            $tab =  self::paginate( $sitepage ,$this->exclude_pages);
            $next = $tab[0];
            $prev = $tab[1];
        }

        /*Check if the checkbox for last_review is on then  assign returned object to a variable*/
        if($sitepage->last_review == "on"){
            $page = $this->thumbnail($this->exclude_pages);
        }

        ////////////////////////BLOCS///////////////////////
        /* Check each bloc format then call appropriate method and assign returned object to a variable*/
        $siteblocs = $this->bloc->getWhereAndOrder('sitepages_id', $sitepage->id,'sort', null);

        foreach($siteblocs as $item){

            // GROUP-HOME//
            if($item->format == "group-home"){
                $bestpage = $this->bestpage($this->exclude_pages);
                $page =$this->thumbnail($this->exclude_pages);
            }

            // BLOC-THUMBNAIL/SMALL GROUP-INDEX-ARTICLE//
            if($item->format == "bloc-thumbnail" ||$item->format == "bloc-thumbnail-small" || $item->format =="group-index-article"){                
                $page = $this->thumbnail($this->exclude_pages);
            }  

            // BLOC-POPULAR//
            if($item->format == "bloc-popular"){
                $bestpage = $this->bestpage($this->exclude_pages);
            }

            //GROUP-ARTICLE-FULL //
            if($item->format == "group-article-full"){
                $page = $this->thumbnail($this->exclude_pages);
                $tab =  $this->paginate( $sitepage ,$this->exclude_pages);
                $next = $tab[0];
                $prev = $tab[1];
            }
        }

        /*/Array of all variables injected in the view/ Check if the variable exist then push variable name to the array*/
        if(isset($bestpage)){
            array_push($arrayView, 'bestpage');
        }
        if(isset($page)){
            array_push($arrayView, 'page');
        }
        if(isset($next) && isset($prev) ) {
            array_push($arrayView , "prev", "next");
        }
        
        /* if($sitepage->model=="onepage") {
            $menus = Websitebloc::select('*')->where('format','like','%title%')->where('sitepages_id',$sitepage->id)->orderBy('sort')->get();
        } else {
            $menus = Websitepage::select('*')->where('slug','homepage')->get();
        } */   
        // Return a view and add the arrayView tab with all variables used in this session.
        return view('site.themes.cms.page',compact($arrayView));
    }


    /**
     * Create a paginated collection for last article thumbnail
     *
     * @param Array $exclude_pages
     * @return paginate
     * @return collection
     */
    public function thumbnail( $exclude_pages){
          
        return $this->page->getWhereNotInAndOrder('slug',$exclude_pages, 'created_at', 'DESC')->paginate(9);
    }

    /**
     * Create a collection for best page
     * Remove old mini thumbnail from directory
     * Add to public directory new mini thumbnail for the section 
     * Then crop the image for better use 
     *
     * @param Array $exclude_pages
     * @return collection
     */
    public function bestpage($exclude_pages){
         $bestpage =  $this->page->getWhereNotInAndOrder('slug',$exclude_pages, 'count', 'DESC')->limit(4)->get();

        //clean mini thumbnail directory
        File::cleanDirectory(public_path('images/miniThumb/')); 
        //Save 4 new mini thumbnail in directory
        self::resizeAndSaveImg($bestpage);
        
        return $bestpage;
    }

    /**
     * Create a $next and $previous variable for paginate
     * @param Array $exclude_pages
     * @param collection $sitepage
     * @return Array
     */
    public static function paginate($sitepage,$exclude_pages){
        //retrieve all active pages
        $pages = Websitepage::select('*')->whereStatus(1)->whereNotIn("slug", $exclude_pages)->orderBy('created_at', 'DESC')->get();
        
        for($i=0; $i<$pages->count(); $i++){
            if($pages[$i]->slug == $sitepage->slug){
                if($i+1 == $pages->count()){  
                    $prev = "noprev";
                    $next = $pages[$i-1]->slug;
                }elseif($i == 0){
                    $prev = $pages[$i+1]->slug;
                    $next = "nonext";
                }elseif($i != 0){
                    $prev = $pages[$i+1]->slug;
                    $next = $pages[$i-1]->slug;
                }
            }
        }
        $paginate = [];
        array_push($paginate, $next, $prev);

        return $paginate;
    }

    /**
     * Crop and save all images of a collection in thumbnail directory
     *
     * @param collection $collection
     * @return void
     */
    public static function resizeAndSaveImg($collection){
        
        foreach($collection as $item){
            // open file a image resource then crop and save   
            Image::make(public_path($item->thumbnail))->crop(100, 100, 100, 100)->save("images/miniThumb/".$item->title_img.".jpg");
        }
    }
}

