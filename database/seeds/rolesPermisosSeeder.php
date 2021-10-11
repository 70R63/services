<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Roles\Roles;
use App\Models\Roles\Permisos;
use Illuminate\Support\Facades\Hash;

class rolesPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //TRUNCAR TABLAS PARA CREAR TODO DESDE CERO

        DB::statement("SET foreign_key_checks=0");
            DB::table('users_roles')->truncate();
            DB::table('users_permisos')->truncate();
            DB::table('roles_permisos')->truncate();
            Permisos::truncate();
            Roles::truncate();
            User::truncate();
       DB::statement("SET foreign_key_checks=1");

        //CREAR USUARIO SYSADMIN

        $usuarioSysAdmin = User::create([
            'name'      => 'SysAdminUser',
            'email'     => 'sysadminuser@gmail.com',
            'password'  => Hash::make('123456789'),
        ]);

        // ROLES

        $rolAdmin  = Roles::create([
            'name' => 'SysAdmin',
            'slug' => 'sysadmin',
        ]);
        $usuarioSysAdmin->roles()->sync([ $rolAdmin->id ]);

        //CREAR PERMISOS

        $permisos_all = [];

        $permisos = Permisos::create([
            'name' => 'Crear',
            'slug' => 'crear'
        ]);
        $permisos_all[] = $permisos ->id;

        $permisos = Permisos::create([
            'name' => 'Editar',
            'slug' => 'editar'
        ]);
        $permisos_all[] = $permisos ->id;

        $permisos = Permisos::create([
            'name' => 'Leer',
            'slug' => 'leer'
        ]);
        $permisos_all[] = $permisos ->id;

        $permisos = Permisos::create([
            'name' => 'Borrar',
            'slug' => 'borrar'
        ]);
        $permisos_all[] = $permisos ->id;

       foreach ($permisos_all as $permiso) {
          $usuarioSysAdmin->permisos()->attach($permiso);
          $usuarioSysAdmin->save();
          $rolAdmin->permisos()->attach($permiso);
          $rolAdmin->save();
        }

    }
}
