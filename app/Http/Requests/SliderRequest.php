<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Models\Site\Slider;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title'          => 'required|min:2|max:255',
            'width'        => 'required|integer|min:2|max:1980',
            'height'        => 'required|integer|min:2|max:1980'
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
            'title.required'          => 'Veuillez saisir un titre',
            'width.required'        => 'Veuillez saisir une largeur de 1980px max',
            'height.required'        => 'Veuillez saisir une longueur de 1980px max'
        ];
    }
}