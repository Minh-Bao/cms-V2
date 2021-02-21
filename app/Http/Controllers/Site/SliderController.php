<?php

namespace App\Http\Controllers\Site;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Site\Slider;
use App\Modelsls\Site\Sliderimage;
use Session;
use DB;

class SliderController extends Controller

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
        $sliders = Slider::all();

        return view('admin.site.slider.index',compact('sliders'));
    }



    public function edit($id)
    {
        try{
            $slider  = Slider::findOrFail($id);
        }

        catch(ModelNotFoundException $err){
            Session::flash('error', 'Slider introuvable.');  
            return redirect()->route('slider.index');

            exit;
        }

        $pictures = DB::table('siteslidersimages')->where('sitesliders_id',$id)->orderBy('sort')->get();

        return view('admin.site.slider.edit',compact('slider','pictures'));
    }

    public function create()
    {

        return view('admin.site.slider.create');

    }





 public function store(Request $request)

    {
        $this->validate($request, [
         'title'          => 'required|min:2|max:255',
         'width'        => 'required|integer|min:2|max:1980',
         'height'        => 'required|integer|min:2|max:1980'
        ]);

        if ($request->ratio=="1:1" && ($request->width<>$request->height)) {
            Session::flash('error', 'Les dimensions ne correspondent pas pour un format carré');  
            return Redirect::to(URL::previous());
        }

        $slider = new Slider;
        $slider->title = $request->title;
        $slider->ratio = $request->ratio;
        $slider->type = $request->type;
        $slider->width = $request->width;
        $slider->height = $request->height;
        $slider->save();

        Session::flash('success', 'Slider ajouté'); 

        return redirect()->route('slider.index');       
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slider::findOrfail($id);
        $images = Sliderimage::select('*')->whereSitesliders_id($id);

        $slide->delete();
        $images->delete();

        Session::flash('success', 'Votre slider a bien été supprimé'); 


        return back();
    }





}

