<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $role1 = Role::firstOrCreate(['name' => 'Admin']);
        $role2 = Role::firstOrCreate(['name' => 'Dueño']);
        $role3 = Role::firstOrCreate(['name' => 'Profesor']);
        $role4 = Role::firstOrCreate(['name' => 'Competidor']);

        $permission = Permission::create(['name' => 'users.index', 'description' => 'Listar Usuarios'])->assignRole($role1,$role2,$role3);
        $permission = Permission::create(['name' => 'users.create', 'description' => 'Crear Usuarios'])->assignRole($role1,$role2,$role3);
        $permission = Permission::create(['name' => 'users.edit', 'description' => 'Editar Usuarios'])->assignRole($role1,$role2,$role3);
        $permission = Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar Usuarios'])->assignRole($role1,$role2,$role3);

        $permission = Permission::create(['name' => 'competencias.index', 'description' => 'Listar Competencias'])->assignRole($role1);
        $permission = Permission::create(['name' => 'competencias.create', 'description' => 'Crear Competencias'])->assignRole($role1);
        $permission = Permission::create(['name' => 'competencias.edit', 'description' => 'Editar Competencias'])->assignRole($role1);
        $permission = Permission::create(['name' => 'competencias.destroy', 'description' => 'Eliminar Competencias'])->assignRole($role1);    
    }
}
