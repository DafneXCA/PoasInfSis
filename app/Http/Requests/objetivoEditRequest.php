<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class objetivoEditRequest extends FormRequest
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
            'objetivoE'=>'required',
            'indicadorE'=>'required'
        ];
    }

    public function messages(){
        return[
            'objetivoE.required'=>'El campo objetivo es requerido',
            'indicadorE.required'=>'El campo indicador es requerido'
        ];
    }
}
