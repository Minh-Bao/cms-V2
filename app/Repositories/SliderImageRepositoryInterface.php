<?php namespace App\Repositories;

interface SliderImageRepositoryInterface
{
    /**
     * retrieve an object of all sliders in db
     *
     * @return collection
     */
    public function all();

    /**
     * retrieve a sliderImage with where and order clause
     * 
     * @param string $field
     * @param mixed $value
     * @param string $order
     * @param mixed $direction
     * @return collection
     */
    public function getWhereAndOrder($field, $value, $order, $direction);

    /**
     * retrieve specified ressource with where clause
     * @param string $field
     * @param mixed $value
     * @return object
     */
    public function getWhere($field, $value);

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
     * @param App\Http\Requests $request
     * @param string $name
     * @param int $nb_pictures
     * @return object
     */
    public function store($request,  $name, $nb_pictures);

    /**
     * delete the specified sliderImage retrieved by its id
     *
     * @param int $id
     * @return void
     */
    public function delete($id);

    /**
     * Select a field with where clause
     *
     * @param  string  $field
     * @param string $where
     * @param mixed $value
     * @return \Illuminate\Http\Response
     */
    public function getFieldWhere($field, $where, $value);
}