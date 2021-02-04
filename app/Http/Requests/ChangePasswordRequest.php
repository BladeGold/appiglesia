<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password-actual' => 'required|min:8|current_password',
            'password' => 'required|confirmed|min:8'
        ];
    }

    public function messages()
    {
        return [
            'current_password' => 'Contraseña actual incorrecta'
            //'min' => 'Debe ingresar un minimo de 8 caracteres'
        ];
    }
}
