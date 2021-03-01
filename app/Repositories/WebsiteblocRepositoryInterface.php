<?php namespace App\Repositories;

interface WebsiteblocRepositoryInterface
{
    /**
     * Get by where clause and order the collection 
     * 
     * @param mixed $field  field of the where clause
     * @param mixed $value value of the where clause field
     * @param mixed $fieldOrder order by the field
     * @param mixed $direction direction of the sort
     * @return Collection
     */
    public function getWhereAndOrder($field, $value, $fieldOrder, $direction);

    /**
     * Find the specified record by its id or throw an error message and return to index
     *
     * @param int $id
     * @return collection or redirect to route
     */
    public function getByPage_id($id);

    /**
     * store a newly created bloc in db
     *
     * @param \Request $request
     * @return collection
     */
    public function store($request);

    /**
     * Update specified resource in db
     *
     * @param Request $request
     * @param int $id
     * @return collection or redirect to route
     */
    public function update($request, $id);

    /**
     * Retrieve a bloc with where clause 
     *
     * @param string $field
     * @param  $value
     * @return object
     */
    public function getWhere(string $field, $value):object;

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
     * @return collection or redirect to route
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