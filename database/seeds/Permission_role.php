<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class Permission_role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Role::find(2);
        $pastor = Role::find(3);
        $tesorera = Role::find(4);
        $secretaria = Role::find(5);

        $permissionUser = array(2, 3, 4, 12, 21, 22, 26, 27, 32, 33, 34);
        $permissionPastor = array(2,3, 4, 12, 16, 17, 18, 19, 21, 22, 26, 27, 28, 29, 31, 32, 33, 34, 41);
        $permissionTesorera = array(2, 3, 4, 12, 16, 17, 18, 19, 21, 22, 26, 27, 32, 33, 34, 31);
        $permissionSecretaria = array(2, 4, 12, 21, 22, 26, 27, 32, 33, 34, 41);

        $user->permissions()->sync($permissionUser);
        $pastor->permissions()->sync($permissionPastor);
        $tesorera->permissions()->sync($permissionTesorera);
        $secretaria->permissions()->sync($permissionSecretaria);
    }
}
