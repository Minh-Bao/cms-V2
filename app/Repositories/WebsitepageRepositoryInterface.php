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
     * retrieve a collection with where clause by a specific field and its value
     * and orderby clause
     * @param string $field specified field of table
     * @param mixed $value value of the field
     * @param string $order
     * @param string $direction
     * @return collection
     */
    public function getWhereAndOrder($field, $value, $order, $direction);

     /**
     * retrieve all published pages (status=1) with whereNotIn clause 
     * 
     * @param string $field
     * @param array $exclude an array of exclude id pages.
     * @param string $order
     * @param string $direction
     * @return collection
     */
    public function getWhereNotInAndOrder($field,$exclude, $order, $direction);

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
     * Get the fist element of the specified field equal to the value
     *
     * @param int $id
     * @return object
     */
    public function getFirst(int $id) :object;

    /**
     * Find the specified record by its id or throw an error message and return to index
     *
     * @param int $id
     * @return void
     */
    public function findOrError($id);

    /**
     * retrieve the specified resource by its id or throw an error
     *
     * @param integer $id
     * @return object
     */
    public function finrOrFails(int $id) :object;
}