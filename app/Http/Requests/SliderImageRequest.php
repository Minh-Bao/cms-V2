<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Models\Site\SliderImage;
use Illuminate\Foundation\Http\FormRequest;

class SliderImageRequest extends FormRequest
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
            'title'         => 'required|min:2|max:150'
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
            'title.required'          => 'Veuillez saisir un titre !!',
        ];
    }
}