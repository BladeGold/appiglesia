<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDate extends Model
{
    protected $primaryKey = 'user_id';
    protected $table= 'users_date';
    protected $fillable = [
            'user_id',
            'fecha_nacimiento',
            'lugar_nacimiento',
            'telefono',
            'sexo',
            'cedula',
            'estado',
            'ciudad',
            'direccion',
            'nacionalidad',
            'estado_civil',
    ];

    public function setLugarNacimientoAttribute($value)
    {
        $string= htmlentities($value);
        $texto= preg_replace('/\&(.)[^;]*;/', '\\1', $string);
        $this->attributes['lugar_nacimiento'] = ucfirst(strtolower($texto));
    }
    public function setCiudadAttribute($value)
    {
        $string= htmlentities($value);
        $texto= preg_replace('/\&(.)[^;]*;/', '\\1', $string);;
        $this->attributes['ciudad'] = ucfirst(strtolower($texto));
    }
    public function setEstadoAttribute($value)
    {
        $string= htmlentities($value);
        $texto= preg_replace('/\&(.)[^;]*;/', '\\1', $string);
        $this->attributes['estado'] = ucfirst(strtolower($texto));
    }
    public function setDireccionAttribute($value)
    {
        $string= htmlentities($value);
        $texto= preg_replace('/\&(.)[^;]*;/', '\\1', $string);
        $this->attributes['direccion'] = ucfirst(strtolower($texto));
    }
    public function setNacionalidadAttribute($value)
    {
        $string= htmlentities($value);
        $texto= preg_replace('/\&(.)[^;]*;/', '\\1', $string);
        $this->attributes['nacionalidad'] = ucfirst(strtolower($texto));
    }
    public function setEstadoCivilAttribute($value)
    {
        $string= htmlentities($value);
        $texto= preg_replace('/\&(.)[^;]*;/', '\\1', $string);
        $this->attributes['estado_civil'] = ucfirst(strtolower($texto));
    }
    public function setSexoAttribute($value)
    {
        $string= htmlentities($value);
        $texto= preg_replace('/\&(.)[^;]*;/', '\\1', $string);
        $this->attributes['sexo'] = ucfirst(strtolower($texto));
    }

    public function esDe(){
        return $this->belongsTo(User::class);
    }
    
}
