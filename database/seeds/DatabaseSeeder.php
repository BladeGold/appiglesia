<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PermissionsTableSeeder::class);
         $this->call(Roles::class);
         $this->call(UserAdmin::class);
         $this->call(UserDefault::class);
         $this->call(Permission_role::class);
    }
}
