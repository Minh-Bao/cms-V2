<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'         => 'required|min:2|max:150',
            'email'        => 'required|min:2|max:150',
            'subject'       => 'required|min:2|max:150',
            'message'       => 'required|min:20',                
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
            'name.required'         => 'Veuillez rentrer un nom dans ce champ!',
            'email.required'        => 'Veuillez rentrer un email dans ce champ!',
            'subject.required'       => 'Veuillez rentrer un sujet a votre message!',
            'message.required'       => 'reqVeuillez rentrer un message dans ce champ!',                
        ];
    }
}