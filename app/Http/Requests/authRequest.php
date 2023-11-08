<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class authRequest extends FormRequest
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
            'user'=>'bail|required|exists:users,user',
            'password'=>'required'
        ];
    }

    public function messages()
    {
        return[
          'user.required'=>'El campo de usuario es obligatorio',
          'user.exists'=>'El usuario no existe',
          'password.required'=>'El campo de contraseña es obligatorio',
        ];
    }
}
