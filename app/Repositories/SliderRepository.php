<?php namespace App\Repositories;

use App\Models\Site\Slider;

class sliderRepository implements SliderRepositoryInterface
{

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
     * retrieve all pages and order by specified field in the specified direction
     * 
     * @param string $field
     * @param string $direction
     * @return void
     */
    public function AllOrderedBy($field, $direction){

        if(isset($direction)){
            return Websitepage::select('*')->orderBy($field, $direction)->get();
        }else{
            return Websitepage::select('*')->orderBy($field)->get();
        }       
	}

    /**
     * retrieve all pages ordered by created_at
     * 
     * @param int $id
     * @return void
     */
    public function getAllOrdered(){
        
        return Websitepage::all();
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request){
                
        SiteWebsitepage::create($request->all());
    }




}