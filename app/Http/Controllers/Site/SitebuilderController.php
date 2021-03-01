<?php



namespace App\Http\Controllers\Site;



use DB;
use Auth;
use Image;
use Session;
use App\Slim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SliderImageRepositoryInterface;
use App\Repositories\SliderRepositoryInterface;
use App\Repositories\WebsiteblocRepositoryInterface;
use App\Repositories\WebsitepageRepositoryInterface;
use Illuminate\Support\Facades\File;

class SitebuilderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WebsitepageRepositoryInterface $page, WebsiteblocRepositoryInterface $bloc, SliderImageRepositoryInterface $sliderImage, SliderRepositoryInterface $slider)
    {
        $this->page = $page;
        $this->bloc = $bloc;
        $this->sliderImage = $sliderImage;
        $this->slider = $slider;
        $this->middleware('auth:');
    }



    /**
     * Retrieve the element from the view specified with his id and Show the edit modal
     *
     * @return \Illuminate\Http\Response
     */
    public function element(Request $request)
    {
        $blocs = File::allFiles(base_path('/resources/views/site/themes/'.env('SITE_THEME').'/blocs/')); 

        $part = $request->get("part");  
        $variable = $request->get("elem");
        $object = $request->get("object"); 
        
        switch($part){
            case 'bloc':
                $config = $this->bloc->getFirst($variable);
                $config->content = $config->$object;
                break;
            case 'page':
                $config = $this->page->getFirst($variable);
                $config->content = $config->$object;
                break;
            case 'slider':
                $config = $this->page->getFirst($variable);
                $config->content = $config->$object;
                break;
            case 'config':
                $config = Siteconfig::select('*')->whereVariable($variable)->first();
                $object="";
                break;
        }

        return view('admin.modals.sitebuilder',compact('part','variable','config','object','blocs'));
    }



    public function edit($id)
    {
        $slider = $this->slider->findBy($id);
        // $pictures = DB::select('select * from siteslidersimages where sitesliders_id = ?', [$slider->id]);
        $pictures = $this->sliderImage->getWhere('sitesliders_id', $slider->id);

        return view('admin.site.slider.edit',compact('slider','pictures'));
    }


    public function change(Request $request,$id)
    {
        $bloc = $this->bloc->finOrFails($id);
        $page = $this->page->finOrFails($bloc->pages_id);
        $new_bloc = $this->bloc->finOrFails($request->get("bloc"));
        $bloc->image = $new_bloc->image;
        $bloc->save();
    }    


    /**
     * Update the specified element
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, int $id) :mixed
    {
        switch($request->part){
            case 'bloc':
                $this->updateBloc($request, $id);
                break;
            case 'page':
                $this->updatePage($request, $id);
                break;
            case 'slider':
                $this->updateSlider($request,$id);        
                break;
            case 'article':
                $this->updateArticle($request, $id);
                break;
            case 'partenaire':
                $this->updatePartenaire($request, $id);
                break;
            case 'config':
                $this->updateconfig($request, $id);
                break;
        }

        Session::flash('success', 'Page modifiée avec succès');  

        return back()->withInput();       
    }


    /**
     * Update specified bloc
     *
     * @param Request $request
     * @param integer $id
     * @return bool
     */
    public function updateBloc(Request $request, int $id):bool{
        $bloc = $this->bloc->finrOrFails($id);
        $page = $this->page->finrOrFails($bloc->sitepages_id);
       
        if ($request->object=="image") {
            $duplicate = $request->duplicate;
            $old = $bloc->image;
            $images = Slim::getImages('slim');        

            if ($images === false) {
                
            } else {
                $image = array_shift($images);

                if ($bloc->title) {

                    $name = str_slug($bloc->title,'-')."-".date('YmdHis').".jpg";

                } else {
                    $name = $page->slug."-".date('YmdHis').".jpg";                
                }

                $data = $image['output']['data'];

                if (isset($image['output']['data'])) {
                    $output = Slim::saveFile($data, $name , 'images/articles/'.date('Y').'/'.date('m').'/' , false);
                }

                $bloc->image = 'images/articles/'.date('Y').'/'.date('m').'/'.$name;

                if ($duplicate=="yes") {
                    echo $old;
                    $batchs = $this->bloc->getWhere('image',$old);

                    foreach($batchs as $batch) {
                        $change = Siteblocs::find($batch->id);
                        $change->image = $bloc->image;
                        $change->save();
                    }
                }
            }

        } else {
            $object = $request->object;
            $bloc->$object = $request->content;
        }

        return $bloc->save();
    }

    /**
     * Update the specified page element
     *
     * @param Request $request
     * @param integer $id
     * @return boolean
     */
    public function updatePage(Request $request ,int $id):bool{
        $page = $this->page->findOrFails($id);

        if ($request->object=="image") {  
            //$siteconfig = Siteconfig::select('*')->orderBy('id')->get();
            $old = public_path($page->image);
            $images = Slim::getImages('slim');

            if ($images === false) {

            } else {
                $image = array_shift($images);
                $name = $page->slug."-".date('YmdHis').".jpg";
                $data = $image['output']['data'];

                if (isset($image['output']['data'])) {
                    $output = Slim::saveFile($data, $name , 'images/articles/'.date('Y') .'/'. date('m') .'/' , false);

                    if(File::exists($old) && isset($page->image)) {
                        unlink($old);
                    }
                }
                $page->image = 'images/articles/'.date('Y').'/'.date('m').'/'.$name;
            }

        } else {
            $object = $request->object;
            $page->$object = $request->content;
        }

        return $page->save();
    }

    /**
     * Updatespecified Article elements
     *
     * @param Request $request
     * @param integer $id
     * @return boolean
     */
    public function updateArticle(Request $request, int $id):bool{
        $siteconfig = Siteconfig::select('*')->orderBy('id')->get();
        $bloc = Article::find($id);
        $old = public_path($bloc->folder.'/'.$bloc->image);
        $old_thumb = public_path($bloc->folder.'/thumb_'.$bloc->image);

        if ($request->object=="image") {
            $images = Slim::getImages('slim');

            if ($images === false) {

            } else {
                $year = date('Y');
                $month = date('m');
                $image = array_shift($images);
                $name = $image['output']['name'];
                $data = $image['output']['data'];

                if (isset($image['output']['data'])) {
                    $output = Slim::saveFile($data, $name , 'images/articles/'. $year .'/'. $month .'/' , false);
                    $location = 'images/articles/'.$year.'/'.$month.'/'.$name;
                    $location_thumb = 'images/articles/'.$year.'/'.$month.'/thumb_'.$name;
                    Image::make($location)->resize($siteconfig[23]->content_fr, $siteconfig[24]->content_fr)->encode('jpg')->save($location_thumb);

                    if(File::exists($old)) {
                        unlink($old);
                    }

                    if(File::exists($old_thumb)) {
                        unlink($old_thumb);
                    }
                }

                $bloc->image = $name;
                $bloc->folder = 'images/articles/'.date('Y').'/'.date('m');
            }
        } else {
            $object = $request->object;
            $bloc->$object = $request->content;
        }

        return $bloc->save();       
    }

    /**
     * Update specified Slider
     *
     * @param Request $request
     * @param integer $id
     * @return boolean
     */
    public function updateSlider(Request $request, int $id):bool{
        $sliderimage = $this->sliderimage->findBy($id);
        $sliderimage->title = $request->title;
        $sliderimage->content = $request->content;
        $sliderimage->link = $request->link;

        $images = Slim::getImages('slim');
        if ($images === false) {

        } else {
            $image = array_shift($images);
            $name = date('Ymdhis').".jpg";
            $data = $image['output']['data'];

            if (isset($image['output']['data'])) {
                    $output = Slim::saveFile($data, $name , 'images/sliders/'. $sliderimage->sitesliders_id .'/' , false);
                    $sliderimage->file = 'images/sliders/'. $sliderimage->sitesliders_id .'/'.$name;
                }
            }

        return $sliderimage->save();       
    }

    /**
     * Update specified partenaires
     *
     * @param Request $request
     * @param integer $id
     * @return boolean
     */
    public function updatePartenaire(Request $request , int $id):bool{
        $siteconfig = Siteconfig::select('*')->orderBy('id')->get();
        $bloc = Partenaire::find($id);

        if ($request->object=="image") {
            $images = Slim::getImages('slim');

            if ($images === false) {

            } else {
                $image = array_shift($images);
                $name = $image['output']['name'];
                $data = $image['output']['data'];

                if (isset($image['output']['data'])) {
                    $output = Slim::saveFile($data, $name , 'images/interface/partenaires/'. $bloc->id .'/' , false);
                }

                $bloc->image = $name;
                $bloc->folder = 'images/interface/partenaires/'. $bloc->id .'/';
            }
        } else {
            $object = $request->object;
            $bloc->$object = $request->content;
        }

        return $bloc->save();       
    }

    /**
     * Update specified configuration
     *
     * @param Request $request
     * @param int $id
     * @return boolean
     */
    public function updateconfig(Request $request,int $id):bool{
        $lng = App::getLocale();
        $configlng = "content_".$lng;
        $config = Siteconfig::find($id);

        if ($config->variable=="url_logo") {
            $logo = Logo::getImages();

            if ($logo === false) {
            } else {
                $image = array_shift($logo);
                $name = $image['output']['name'];
                $data = $image['output']['data'];

                if (isset($image['output']['data'])) {
                    $output = Logo::saveFile($data, $name , 'images/' , false);
                }

                $config->content = "images/".$name;
            }
        }

        if ($config->variable=="image_news") {
            $old = public_path($config->$configlng);
            $images = Slim::getImages('slim');
            $image = array_shift($images);
            $name = "image-actu-".date('YmdHis').".jpg";
            $data = $image['output']['data'];

            if (isset($image['output']['data'])) {
                $output = Slim::saveFile($data, $name , 'images/articles/'.date('Y').'/'.date('m').'/' , false);
            }

            $config->$configlng = 'images/articles/'.date('Y').'/'.date('m').'/'.$name;

            if(File::exists($old)) {
                unlink($old);
            }
        }

        if ($config->variable <>"url_logo" && $config->variable <>"image_news") {
            $config->$configlng = $request->content;
        }
        return $config->save();
    }
}

