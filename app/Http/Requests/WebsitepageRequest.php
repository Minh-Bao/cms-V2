<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Models\Site\Websitepage;
use Illuminate\Foundation\Http\FormRequest;

class WebsitepageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method() == "PUT"){
            return [
                'name'              => 'required|min:2|max:200',
                'title'             => 'required|min:2|max:200',
                'alt_img'           => 'required|min:2|max:200',
                'title_img'         => 'required|min:2|max:200',            
                'meta_title'        => 'required|min:2|max:75',
                'meta_desc'         => 'required|min:2|max:200'
            ];
            }
        return [
            'name'              => 'required|min:2|max:200',
            'slug'              => 'required|min:2|max:200|unique:sitepages',
            'title'             => 'required|min:2|max:200',
            'alt_img'           => 'required|min:2|max:200',
            'title_img'         => 'required|min:2|max:200',            
            'meta_title'        => 'required|min:2|max:75',
            'meta_desc'         => 'required|min:2|max:200'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'slug.unique'               => 'Ce slug existe déjà.',
        ];
    }
}