<?php namespace App\Repositories;

use App\Models\Site\Websitebloc;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WebsiteblocRepository implements WebsiteblocRepositoryInterface
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
    public function getWhereAndOrder($field, $value, $fieldOrder, $direction){

        if($direction != null){
            return Websitebloc::where('sitepages_id',$value)->orderBy($fieldOrder, $direction)->get();
        }else{
            return Websitebloc::where('sitepages_id',$value)->orderBy($fieldOrder)->get();
        }
	}

    /**
     * Find the specified record by its id or throw an error message and return to index
     *
     * @param int $id
     * @return collection or redirect to route
     */
    public function getByPage_id($id){
        
        return Websitebloc::select('*')->whereSitepages_id($id);
    }

    /**
     * store a newly created bloc in db 
     *
     * @param \Request $request
     * @return collection
     */
    public function store($request){

        $bloc = new Websitebloc();
        
        $bloc->sitepages_id     = $request->sitepages_id;
        $bloc->title            = $request->title;
        $bloc->alt_img          = $request->alt_img;
        $bloc->title_img        = $request->title_img;
        $bloc->content          = $request->content;
        $bloc->format           = $request->format;
        $bloc->save();

        return $bloc;
    }

    /**
     * Update specified resource in db
     *
     * @param Request $request
     * @param int $id
     * @return collection or redirect to route
     */
    public function update($request, $id){

        $bloc                   = Websitebloc::find($id);
        $bloc->title            = $request->title;
        $bloc->alt_img          = $request->alt_img;
        $bloc->title_img        = $request->title_img;
        $bloc->content          = $request->content;
        $bloc->format           = $request->format;
        $bloc->save();

        return $bloc;

    }

    /**
     * Retrieve a bloc with where clause 
     *
     * @param string $field
     * @param  $value
     * @return object
     */
    public function getWhere(string $field, $value):object {

        return Websitebloc::where($field, $value)->get();
    }

    /**
     * Get the fist element of the specified field equal to the value
     *
     * @param int $id
     * @return object
     */
    public function getFirst(int $id) :object{

        return Websitebloc::whereId($id)->first();
    }

    /**
     * Find the specified record by its id or throw an error message and return to index
     *
     * @param int $id
     * @return collection or redirect to route
     */
    public function findOrError($id){
        try{
            $websitebloc  = Websitebloc::findOrFail($id);
        }
        catch(ModelNotFoundException $err){
            Session::flash('error', 'Bloc introuvable.');  

            return redirect()->route('websitepage.index');
        } 
        return $websitebloc;
    }

    /**
     * retrieve the specified resource by its id or throw an error
     *
     * @param integer $id
     * @return object
     */
    public function finrOrFails(int $id) :object{

        return Websitebloc::findOrFail($id);
    }
        

 
}