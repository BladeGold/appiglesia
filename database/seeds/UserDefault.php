<?php

use Illuminate\Database\Seeder;
use App\User;
class UserDefault extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $user = array();
        for ($i=0; $i < 11 ; $i++) { 
            $user[$i] = User::create([
                "email" => "user".$i."@test.com",
                "name" => "Usuario".$i,
                "last_name" => "User".$i,
                "password" => bcrypt("qwerty"),
                
            ]);
    
            $user[$i]->assignRoles('user');
        }
    }
}
