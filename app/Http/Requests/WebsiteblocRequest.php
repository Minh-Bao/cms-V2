<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Models\Site\Websitebloc;
use Illuminate\Foundation\Http\FormRequest;

class WebsiteblocRequest extends FormRequest
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
        
        return [
            'format'         => 'required'
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
            'format'               => 'Veuillez choisir un type de bloc',
        ];
    }
}