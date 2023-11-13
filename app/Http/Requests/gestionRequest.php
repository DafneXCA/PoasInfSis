<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class gestionRequest extends FormRequest
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
            'gestion'=>'bail|required|unique:gestions,nombre'
        ];
    }

    public function messages(){
        return [
            'gestion.required'=>'El campo gestion es requerido',
            'gestion.unique'=>'La gestion ya existe',
        ];
    }
}
