<?php

namespace App\Http\Controllers\Site;

use DB;
use Session;
use App\Models\Site\Slider;
use Illuminate\Http\Request;
use App\Modelsls\Site\SliderImage;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\SliderRepositoryInterface;
use App\Repositories\SliderImageRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SliderController extends Controller

{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SliderRepositoryInterface $slider, SliderImageRepositoryInterface $sliderImage)
    {
            $this->middleware('auth:');
            $this->slider = $slider;
            $this->sliderImage = $sliderImage;
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->slider->all();

        return view('admin.site.slider.index',compact('sliders'));
    }


    /**
     * Show the form for edit the slider
     *
     * @param int $id
     * @return view
     */
    public function edit($id)
    {
        $slider = $this->slider->findOrError($id);

        $pictures = $this->sliderImage->getWhereAndOrder('sitesliders_id',$id, 'sort', null);

        return view('admin.site.slider.edit',compact('slider','pictures'));
    }

    /**
     * show the form to create a new slider
     *
     * @return view
     */
    public function create()
    {
        return view('admin.site.slider.create');

    }


    /**
     * Store a newly created slider in db
     *
     * @param SliderRequest $request
     * @return view
     */
    public function store(SliderRequest $request)
    {
        if ($request->ratio=="1:1" && ($request->width<>$request->height)) {
            Session::flash('error', 'Les dimensions ne correspondent pas pour un format carré');  
            return Redirect::to(URL::previous());
        }

        $this->slider->store($request);

        Session::flash('success', 'Slider ajouté'); 

        return redirect()->route('slider.index');       
    }


    /**
     * Remove the specified slide and his images from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = $this->slider->findOrError($id);
        $images = $this->sliderImage->getWhere('sitesliders_id', $id);

        $slide->delete();
        foreach($images as $item){
            $item->delete();
        }

        Session::flash('success', 'Votre slider a bien été supprimé'); 


        return back();
    }





}

