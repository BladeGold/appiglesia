<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'       => 'Administrator',
            'slug'       => 'admin',
            'description' => 'Administrator User',
            'special'    => 'all-access',
        ]);

        Role::create([
            'name'       => 'Usuario',
            'slug'       => 'user',
            'description' => 'Miembro de una Iglesia',
            'special'    => null,
        ]);

        Role::create([
            'name'       => 'Pastor',
            'slug'       => 'pastor',
            'description' => 'Pastor de una Iglesia',
            'special'    => null,
        ]);

        Role::create([
            'name'       => 'Tesorera',
            'slug'       => 'tesorera',
            'description' => 'Administra la finanzas de la Iglesia',
            'special'    => null,
        ]);

        Role::create([
            'name'       => 'Secretaria',
            'slug'       => 'secretaria',
            'description' => 'Secretaria del la Iglesia',
            'special'    => null,
        ]);
    }
}
