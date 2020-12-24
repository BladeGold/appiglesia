<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserUpdateFormRequest extends FormRequest
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
                 'sexo' => 'required',
                 'ciudad' => 'required',
                 'cedula' =>  'max:8',
                 'estado' => 'required',
                 'direccion' => 'required',
                 'nacionalidad' => 'required',
                 'estado_civil' => 'required',
                 'name' => 'required|min:5|max:255|alpha',
                 'last_name' => 'required|min:5|max:255|alpha',
                 'imagen' => 'mimes:jpeg,png',
                 'email' => 'string', 'email:filter', 'max:255', 'unique:users',

        ];
    }
}
