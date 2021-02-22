<?php namespace App\Repositories;

interface SliderRepositoryInterface
{
    /**
     * Create an Array of slider with key= slider id and value = slider title
     * 
     * @param int $id
     * @return void
     */
    public function getAllInArray();

    /**
     * retrieve all pages 
     * 
     * @param int $id
     * @return void
     */
    public function AllOrderedBy($field, $direction);
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function store($request);
}