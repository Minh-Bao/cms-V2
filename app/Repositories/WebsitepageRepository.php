<?php namespace App\Repositories;

use App\Models\Site\Websitepage as SiteWebsitepage;
use App\Models\Websitepage;

class WebsitepageRepository implements WebsitepageRepositoryInterface
{

    /**
     * retrieve all pages 
     * 
     * @param int $id
     * @return void
     */
    public function getAll(){
        
        return Websitepage::all();

	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request){
                
        SiteWebsitepage::create($request->all());
    }




}