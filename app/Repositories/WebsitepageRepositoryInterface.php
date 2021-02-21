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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function store($request);
}