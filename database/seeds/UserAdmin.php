<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserDate;
use Illuminate\Support\Carbon;

class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "email" => "admin@test.com",
            "name" => "Administrator",
            "last_name" => "User",
            "password" => bcrypt("qwerty"),
            
        ]);

        $user->assignRoles('admin');

        UserDate::create([
            'user_id' => $user->id,
            'fecha_nacimiento' => Carbon::now(),
            'lugar_nacimiento' => 'default',
            'telefono' => 'default',
            'sexo' => 'Masculino',
            'cedula' => 00000000,
            'estado' => 'default',
            'ciudad' => 'default',
            'direccion' => 'default',
            'nacionalidad' => 'default',
            'estado_civil' => 'Soltero',
        ]);
    }
}
