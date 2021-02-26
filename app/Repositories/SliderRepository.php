<?php namespace App\Repositories;

use App\Models\Site\Slider;

class sliderRepository implements SliderRepositoryInterface
{
    /**
     * retrieve an object of all sliders in db
     *
     * @return collection
     */
    public function all(){

        return Slider::all();
    }
    /**
     * Create an Array of slider with key= slider id and value = slider title
     * 
     * @return Array
     */
    public function getAllInArray(){
        
        $all = Slider::all();
        $array = array();

        foreach ($all as $slider) {
            $array[$slider->id] = strip_tags($slider->title);
        }

        return $array;
	}

    /**
     * retrieve specified ressource by its id
     * @param int  $id
     * @return object
     */
    public function findBy($id){
        
        return Slider::find($id);
	}

    /**
     * find the specified slider or show error message and return to previous page
     *
     * @param int $id
     * @return object or view
     */
    public function findOrError($id){
        try{
            $slider  = Slider::findOrFail($id);
            return $slider;

        } catch(ModelNotFoundException $err){

            Session::flash('error', 'Slider introuvable.');  
            return back();
        }
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request){
                
        return Slider::create($request->except('_token', '_method'));
    }




}