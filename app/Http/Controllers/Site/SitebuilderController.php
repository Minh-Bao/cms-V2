<?php



namespace App\Http\Controllers\Site;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\App;
use App\Models\Site\Websitepage;
use App\Models\Site\Websitebloc;
use App\Slim;
use App\Models\Site\Slider;
use App\Models\Site\Sliderimage;
use Image;
use Auth;
use DB;
use Session;

class SitebuilderController extends Controller
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
    public function element(Request $request)
    {
        $blocs = File::allFiles(base_path('/resources/views/site/themes/'.env('SITE_THEME').'/blocs/'));

        $part = $request->get("part");
        $variable = $request->get("elem");
        $object = $request->get("object");   

        if ($part=="config") {                        
            $config = Siteconfig::select('*')->whereVariable($variable)->first();
            $object="";
        }
        
        if ($part=="bloc") { 
            $config = Websitebloc::select('*')->where('id',$variable)->first();
            $config->content = $config->$object;
            
        }

        if ($part=="page") { 
            $config = Websitepage::select('*')->where('id',$variable)->first();
            $config->content = $config->$object;
        }

        if ($part=="slider") { 
            $config = Sliderimage::select('*')->where('id',$variable)->first();
            $config->content = $config->$object;
        }

        return view('admin.modals.sitebuilder',compact('part','variable','config','object','blocs'));
    }



    public function edit($id)
    {
        $slider = Slider::find($id);
        $pictures = DB::select('select * from siteslidersimages where sitesliders_id = ?', [$slider->id]);

        return view('admin.site.slider.edit',compact('slider','pictures'));
    }


    public function change(Request $request,$id)
    {
        $bloc = Siteblocs::findOrFail($id);
        $page = Sitepage::findOrFail($bloc->pages_id);
        $new_bloc = Siteblocs::findOrFail($_REQUEST["bloc"]);
        $bloc->image = $new_bloc->image;
        $bloc->save();
    }    


    public function update(Request $request,$id)
    {
      if ($request->part=="config") {
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
        $config->save();
    }

    if ($request->part=="bloc") {
        $bloc = Websitebloc::find($id);
        $page = Websitepage::find($bloc->sitepages_id);
       
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
                    $batchs = Websitebloc::select('*')->where('image',$old)->get();

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

        $bloc->save();     
    }

    if ($request->part=="page") {
        $page = Websitepage::find($id);

        if ($request->object=="image") {  
            //$siteconfig = Siteconfig::select('*')->orderBy('id')->get();
            $old = public_path($page->image);
            $images = Slim::getImages('slim');

            if ($images === false) {

            } else {
                $year = date('Y');
                $month = date('m');
                $image = array_shift($images);
                $name = $page->slug."-".date('YmdHis').".jpg";
                $data = $image['output']['data'];

                if (isset($image['output']['data'])) {
                    $output = Slim::saveFile($data, $name , 'images/articles/'. $year .'/'. $month .'/' , false);

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

        $page->save();
    }

    if ($request->part=="article") {
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

        $bloc->save();       
      }

      if ($request->part=="slider") {
        $page = Sliderimage::find($id);
        $page->title = $request->title;
        $page->content = $request->content;
        $page->link = $request->link;
        $images = Slim::getImages('slim');

        if ($images === false) {

        } else {
            $year = date('Y');
            $month = date('m');
            $image = array_shift($images);
            $name = date('Ymdhis').".jpg";
            $data = $image['output']['data'];

            if (isset($image['output']['data'])) {
                    $output = Slim::saveFile($data, $name , 'images/sliders/'. $page->sitesliders_id .'/' , false);
                    $page->file = 'images/sliders/'. $page->sitesliders_id .'/'.$name;
                }
            }

        $page->save();       
    }

    if ($request->part=="partenaire") {
        $siteconfig = Siteconfig::select('*')->orderBy('id')->get();
        $bloc = Partenaire::find($id);

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
                    $output = Slim::saveFile($data, $name , 'images/interface/partenaires/'. $bloc->id .'/' , false);
                }

                $bloc->image = $name;
                $bloc->folder = 'images/interface/partenaires/'. $bloc->id .'/';
            }
        } else {
            $object = $request->object;
            $bloc->$object = $request->content;
        }

        $bloc->save();       
      }

        Session::flash('success', 'Page modifiée avec succès');  

        return back()->withInput();       
    }
}

