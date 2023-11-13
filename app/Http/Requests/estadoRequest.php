<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class estadoRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        if ($this->input('estado') != 'En progreso') {
        
            $this->request->remove('porcentaje');
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'estado'=>'required',
            'porcentaje'=>'sometimes|required|numeric|between:1,100'
        ];
    }

    public function messages(){
        return [
            'porcentaje.required'=>'El campo porcentaje es requerido',
            'porcentaje.between'=>'El porcentaje debe estar entre 1 y 100'
        ];
    }

}
