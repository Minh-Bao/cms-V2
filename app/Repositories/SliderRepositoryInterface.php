<?php namespace App\Repositories;

interface SliderRepositoryInterface
{
    /**
     * retrieve an object of all sliders in db
     *
     * @return collection
     */
    public function all();

     /**
     * Create an Array of slider with key= slider id and value = slider title
     * 
     * @param int $id
     * @return void
     */
    public function getAllInArray(); 

    /**
     * retrieve specified ressource by its id
     * @param int  $id
     * @return object
     */
    public function findBy($id);

     /**
     * find the specified slider or show error message and return to previous page
     *
     * @param int $id
     * @return object or view
     */
    public function findOrError($id);
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function store($request);
}