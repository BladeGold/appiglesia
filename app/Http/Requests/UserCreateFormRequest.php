<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateFormRequest extends FormRequest
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
            'fecha_nacimiento' => 'required|date',
            'lugar_nacimiento' => 'required|max:255',
            'telefono' => 'required|max:11',
            'cedula' => 'required|digits:8|unique:users_date',
            'sexo' => 'required',
            'ciudad' => 'required',
            'estado' => 'required',
            'direccion' => 'required|min:5|max:255',
            'nacionalidad' => 'required|min:5|max:255|alpha',
            'estado_civil' => 'required',
        ];
    }
}
