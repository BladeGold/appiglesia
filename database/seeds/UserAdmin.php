<?php

use Illuminate\Database\Seeder;
use App\User;

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
    }
}
