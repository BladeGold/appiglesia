<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventosFormRequest extends FormRequest
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
            
            'titulo' => "required|alpha",
            'hora' => "required",
           'fechaend' => "required|date",
           'horaend' => "required",
           'descripcion' => "required|",
        ];
    }
    public function messages()
{
    return [
        'titulo.required' => 'Por favor agrega un titulo al evento.',
        'titulo.alpha' =>'Solo puede contener letras',
        'hora.required' => 'Por favor agrega la hora del evento',
        'fechaend.required' => 'Por favor agrega una fecha de culminación para el evento',
        'fechaend.date' => 'Solo se acepta fecha en el campo :campo',
        'horaend.required' => 'Por Favor agrega una hora de culminación del evento'
    ];
}
}
