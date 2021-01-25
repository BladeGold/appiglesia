<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;
use Caffeinated\Shinobi\Concerns\HasPermissions;
use Caffeinated\Shinobi\Concerns\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'last_name','email', 'password','imagen'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst(mb_strtolower($value));
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(mb_strtolower($value));
    }



    //Relación Usuarios Iglesias

    public function Pertenece(){

        return $this->belongsToMany(Iglesia::class)->withTimestamps();
    }

    public function asignarIglesia($id){
        $this->Pertenece()->sync($id, false);

    }
    public function esMiembro(){

        return  $this->Pertenece->flatten()->pluck('name')->unique();

    }

    //Relacion Usuarios Datos

    public function Tiene(){
        return $this->hasOne(UserDate::class);
    }
}
