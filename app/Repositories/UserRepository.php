<?php namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * retrieve an object of all sliders in db
     *
     * @return collection
     */
    public function all(){

        return User::all();
    }

    /**
     * Create a new user in DB
     *
     * @return object
     */
    public function create(){

        return User::create();
    }

}