<?php namespace App\Repositories;

interface WebsitepageRepositoryInterface
{
    /**
     * retrieve all pages 
     * 
     * @param int $id
     * @return void
     */
    public function getAll();

    /**
     * retrieve all pages 
     * 
     * @param int $id
     * @return void
     */
    public function AllOrderedBy($field, $direction);
  
    /**
     * Create an array of specified language pages ordered by title
     * 
     * @param string $lang specified language
     * @return Array
     */
    public function arrayWhereLang($lang);

    /**
     * retrieve a collection by a specific field and its value
     * 
     * @param string $field specified field of table
     * param string $value value of the field
     * @return collection
     */
    public function getWhere($field, $value);

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function store($request);

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return void
     */
    public function update($request, $id);

    /**
     * Find the specified record by its id or throw an error message and return to index
     *
     * @param int $id
     * @return void
     */
    public function findOrError($id);
}