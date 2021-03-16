<?php namespace App\Repositories;

interface UserRepositoryInterface
{
    /**
     * retrieve an object of all sliders in db
     *
     * @return collection
     */
    public function all();

        /**
     * Create a new user in DB
     *
     * @return object
     */
    public function create();

}