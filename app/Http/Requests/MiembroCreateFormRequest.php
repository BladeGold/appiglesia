<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MiembroCreateFormRequest extends FormRequest
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
                'name' => 'required|string|max:255|alpha|min:5',
                'last_name' => 'required|string|max:255|alpha|min:5',
                'email' => 'required|string|email:filter|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
        ];
    }
}
