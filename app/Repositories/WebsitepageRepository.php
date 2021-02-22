<?php namespace App\Repositories;

use App\Models\Site\Websitepage;

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
     * retrieve all pages and order by specified field in the specified direction
     * 
     * @param string $field
     * @param string $direction
     * @return void
     */
    public function AllOrderedBy($field, $direction){

        if(isset($direction)){
            return Websitepage::select('*')->orderBy($field, $direction)->get();
        }else{
            return Websitepage::select('*')->orderBy($field)->get();
        }       
	}

    /**
     * Create an array of specified language pages ordered by title
     * 
     * @param string $lang specified language
     * @return Array
     */
    public function arrayWhereLang($lang){
        
        $all = Websitepage::where('lng',$lang)->orderBy('title')->get();

        foreach($all as $websitepage) {
            $websitepages[ $websitepage->id] = $websitepage->title.' ('. $websitepage->slug .')';          
        }

        return $websitepages;
    }

    /**
     * retrieve a collection by a specific field and its value
     * 
     * @param string $field specified field of table
     * param string $value value of the field
     * @return collection
     */
    public function getWhere($field, $value){
        
        return Websitepage::where($field, $value)->orderBy('title')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request){
                
        $page                   = new Websitepage();
        $page->lng              = "fr";
        $page->name             = $request->name;
        $page->title            = $request->title;
        $page->slug             = $request->slug;
        $page->alt_img          = $request->alt_img;
        $page->title_img        = $request->title_img;
        $page->meta_title       = $request->meta_title;
        $page->meta_desc        = $request->meta_desc;
        $page->paginate         = $request->paginate;
        $page->last_review      = $request->last_review;
        $page->author           = auth()->user()->name;
        $page->content          = $request->content;
        $page->slider_id        = $request->slider_id;
        $page->translate_id     = $request->translate_id;
        $page->save();

        return $page;

    }

     /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return void
     */
    public function update($request, $id){

        return Websitepage::whereId($id)->update($request->except('_token', '_method', 'action', 'image', 'thumbnail'));

    }

    /**
     * Find the specified record by its id or throw an error message and return to index
     *
     * @param int $id
     * @return collection or redirect to route
     */
    public function findOrError($id){
        try{
            $websitepage  = Websitepage::findOrFail($id);
        }
        catch(ModelNotFoundException $err){
            Session::flash('error', 'Fiche introuvable.');

            return redirect()->route('websitepage.index');
        } 
        
        return $websitepage;
    }
}