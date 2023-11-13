<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class objetivoRequest extends FormRequest
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
            'objetivo'=>'required',
            'indicador'=>'required'
        ];
    }

    public function messages(){
        return[
            'objetivo.required'=>'El campo objetivo es requerido',
            'indicador.required'=>'El campo indicador es requerido'
        ];
    }
}
