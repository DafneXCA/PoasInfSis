<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'cod_sis'=>'bail|required|integer|unique:users,cod_sis',
            'nombre'=>'required'
        ];
    }

    public function messages(){
        return [
            'cod_sis.required'=>'El campo código sis es requerido',
            'cod_sis.integer'=>'El campo código sis debe ser un número',
            'cod_sis.unique'=>'Ya existe un usuario con ese código sis',
            'nombre.required'=>'El campo nombre es requerido'
        ];
    }
}
