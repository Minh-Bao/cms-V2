<?php namespace App\Repositories;

use App\Models\Site\Websitebloc;

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
}