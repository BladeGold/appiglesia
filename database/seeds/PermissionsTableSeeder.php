<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //Usuarios
        Permission::create([
            'name'          =>  'Navegar usuarios',
            'slug'          =>  'users.index',
            'description'   =>  'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name'          =>  'Ver detalles de usuario',
            'slug'          =>  'users.show',
            'description'   =>  'Ver en detalle cada usuario del sistema',
        ]);
        Permission::create([
            'name'          =>  'Creación de datos de usuario',
            'slug'          =>  'users.create',
            'description'   =>  'Registrar datos de un usuario',
        ]);
        Permission::create([
            'name'          =>  'Edicion de usuarios',
            'slug'          =>  'users.edit',
            'description'   =>  'Editar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
            'name'          =>  'Eliminar usuario',
            'slug'          =>  'users.destroy',
            'description'   =>  'Eliminar cualquier usuario del sistema',
        ]);


        //Roles
        Permission::create([
            'name'          =>  'Navegar roles',
            'slug'          =>  'roles.index',
            'description'   =>  'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
            'name'          =>  'Ver detalles de rol',
            'slug'          =>  'roles.show',
            'description'   =>  'Ver en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'          =>  'Creación de roles',
            'slug'          =>  'roles.create',
            'description'   =>  'Crear un rol en el sistema',
        ]);
        Permission::create([
            'name'          =>  'Edición de roles',
            'slug'          =>  'roles.edit',
            'description'   =>  'Editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
            'name'          =>  'Eliminar rol',
            'slug'          =>  'roles.destroy',
            'description'   =>  'Eliminar cualquier rol del sistema',
        ]);
        
         //Iglesia
        Permission::create([
            'name'          =>  'Navegar iglesias',
            'slug'          =>  'iglesias.index',
            'description'   =>  'Lista y navega todas las iglesias del sistema',
        ]);
        Permission::create([
            'name'          =>  'Ver detalles de iglesia',
            'slug'          =>  'iglesias.show',
            'description'   =>  'Ver en detalle cada iglesia del sistema',
        ]);
        Permission::create([
            'name'          =>  'Creación de iglesias',
            'slug'          =>  'iglesias.create',
            'description'   =>  'Crear una iglesia en el sistema',
        ]);
        Permission::create([
            'name'          =>  'Edición de iglesias',
            'slug'          =>  'iglesias.edit',
            'description'   =>  'Editar cualquier dato de una iglesia del sistema',
        ]);
        Permission::create([
            'name'          =>  'Eliminar iglesia',
            'slug'          =>  'iglesias.destroy',
            'description'   =>  'Eliminar cualquier iglesia del sistema',
        ]);

        //Finanzas
        Permission::create([
            'name'          =>  'Navegar Finanzas',
            'slug'          =>  'finanzas.index',
            'description'   =>  'Lista y navega todas las Finanzas del sistema',
        ]);
        Permission::create([
            'name'          =>  'Ver detalles de finanza',
            'slug'          =>  'finanzas.show',
            'description'   =>  'Ver en detalle cada finanza del sistema',
        ]);
        Permission::create([
            'name'          =>  'Creación de Finanzas',
            'slug'          =>  'finanzas.create',
            'description'   =>  'Crear una finanza en el sistema',
        ]);
        Permission::create([
            'name'          =>  'Edición de Finanzas',
            'slug'          =>  'finanzas.edit',
            'description'   =>  'Editar cualquier dato de una finanza del sistema',
        ]);
        Permission::create([
            'name'          =>  'Eliminar finanza',
            'slug'          =>  'finanzas.destroy',
            'description'   =>  'Eliminar cualquier finanza del sistema',
        ]);

        //Noticias
        Permission::create([
            'name'          =>  'Navegar noticias',
            'slug'          =>  'noticias.index',
            'description'   =>  'Lista y navega todas las noticias del sistema',
        ]);
        Permission::create([
            'name'          =>  'Ver detalles de noticia',
            'slug'          =>  'noticias.show',
            'description'   =>  'Ver en detalle cada noticia del sistema',
        ]);
        Permission::create([
            'name'          =>  'Creación de noticias',
            'slug'          =>  'noticias.create',
            'description'   =>  'Crear una noticia en el sistema',
        ]);
        Permission::create([
            'name'          =>  'Edición de noticias',
            'slug'          =>  'noticias.edit',
            'description'   =>  'Editar cualquier dato de una noticia del sistema',
        ]);
        Permission::create([
            'name'          =>  'Eliminar noticia',
            'slug'          =>  'noticias.destroy',
            'description'   =>  'Eliminar cualquier noticia del sistema',
        ]);

        //Eventos
        Permission::create([
            'name'          =>  'Navegar eventos',
            'slug'          =>  'eventos.index',
            'description'   =>  'Lista y navega todos los eventos del sistema',
        ]);
        Permission::create([
            'name'          =>  'Ver detalles de evento',
            'slug'          =>  'eventos.show',
            'description'   =>  'Ver en detalle cada evento del sistema',
        ]);
        Permission::create([
            'name'          =>  'Creación de eventos',
            'slug'          =>  'eventos.create',
            'description'   =>  'Crear un evento en el sistema',
        ]);
        Permission::create([
            'name'          =>  'Edición de eventos',
            'slug'          =>  'eventos.edit',
            'description'   =>  'Editar cualquier dato de un evento del sistema',
        ]);
        Permission::create([
            'name'          =>  'Eliminar evento',
            'slug'          =>  'eventos.destroy',
            'description'   =>  'Eliminar cualquier evento del sistema',
        ]);

        //Diezmos
        Permission::create([
            'name'          =>  'Navegar diezmos',
            'slug'          =>  'diezmos.index',
            'description'   =>  'Lista y navega todos los diezmos del sistema',
        ]);
        Permission::create([
            'name'          =>  'Ver detalles de diezmo',
            'slug'          =>  'diezmos.show',
            'description'   =>  'Ver en detalle cada diezmo del sistema',
        ]);
        Permission::create([
            'name'          =>  'Creación de diezmos',
            'slug'          =>  'diezmos.create',
            'description'   =>  'Crear un diezmo en el sistema',
        ]);
        Permission::create([
            'name'          =>  'Edición de diezmos',
            'slug'          =>  'diezmos.edit',
            'description'   =>  'Editar cualquier dato de un diezmo del sistema',
        ]);
        Permission::create([
            'name'          =>  'Eliminar diezmo',
            'slug'          =>  'diezmos.destroy',
            'description'   =>  'Eliminar cualquier diezmo del sistema',
        ]);

        //Administrador
        Permission::create([
            'name'          =>  'Navegar ',
            'slug'          =>  'admin.index',
            'description'   =>  'Lista y navega ',
        ]);
        Permission::create([
            'name'          =>  'Ver detalles ',
            'slug'          =>  'admin.show',
            'description'   =>  'Ver en detalle ',
        ]);
        Permission::create([
            'name'          =>  'Creación ',
            'slug'          =>  'admin.create',
            'description'   =>  'Crear ',
        ]);
        Permission::create([
            'name'          =>  'Edición ',
            'slug'          =>  'admin.edit',
            'description'   =>  'Editar ',
        ]);
        Permission::create([
            'name'          =>  'Eliminar',
            'slug'          =>  'admin.destroy',
            'description'   =>  'Eliminar ',
        ]);

        Permission::create([
            'name'          =>  'Crear un nuevo miembro',
            'slug'          =>  'users.createMiembro',
            'description'   =>  'Crea un nuevo miembro dentro de la iglesia ',
        ]);


        //Creando Rol Administrador
        

    }
}
