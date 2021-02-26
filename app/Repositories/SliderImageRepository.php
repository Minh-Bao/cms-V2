<?php namespace App\Repositories;

use App\Models\Site\SliderImage;

class sliderImageRepository implements SliderImageRepositoryInterface
{
    /**
     * retrieve an object of all sliders in db
     *
     * @return collection
     */
    public function all(){

        return SliderImage::all();
    }

    /**
     * retrieve a sliderImage with where and order clause
     * 
     * @param string $field
     * @param mixed $value
     * @param string $order
     * @param mixed $direction
     * @return collection
     */
    public function getWhereAndOrder($field, $value, $order, $direction){

        if($direction == null){
            return sliderImage::where($field, $value)->orderBy($order)->get();
        }else{
            return sliderImage::where($field, $value)->orderBy($order, $direction)->get();
        }
	}

    /**
     * retrieve specified ressource with where clause
     * @param string $field
     * @param mixed $value
     * @return object
     */
    public function getWhere($field, $value){
        
        return SliderImage::where($field, $value)->get();
	}

    /**
     * retrieve specified ressource by its id
     * @param int  $id
     * @return object
     */
    public function findBy($id){
        
        return SliderImage::find($id);
	}

    /**
     * find the specified slider or show error message and return to previous page
     *
     * @param int $id
     * @return object or view
     */
    public function findOrError($id){
        try{
            $slider  = SliderImage::findOrFail($id);
            return $slider;

        } catch(ModelNotFoundException $err){

            Session::flash('error', 'Slider introuvable.');  
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests $request
     * @param string $name
     * @param int $nb_pictures
     * @return object
     */
    public function store($request,  $name, $nb_pictures){
        $picture = new Sliderimage;

        $picture->sitesliders_id = $request->sitesliders_id;
        $picture->picture = 'images/sliders/' . $request->sitesliders_id . '/' . $name;
        $picture->title = $request->title;
        $picture->content = $request->content;
        $picture->sort = $nb_pictures + 1;
        $picture->status = "on";
        $picture->save();

        return $picture;
    }

    /**
     * delete the specified sliderImage retrieved by its id
     *
     * @param int $id
     * @return void
     */
    public function delete($id){
        return SliderImage::findOrfail($id)->delete();
    }

    /**
     * Select a field with where clause
     *
     * @param  string  $field
     * @param string $where
     * @param mixed $value
     * @return \Illuminate\Http\Response
     */
    public function getFieldWhere($field, $where, $value){
                
        return SliderImage::select($field)->where($where, $value)->get();
    }




}