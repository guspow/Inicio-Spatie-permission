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
        
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Profesor']);
        $role3 = Role::create(['name' => 'Competidor']);

        $permission = Permission::create(['name' => 'competencias.index'])->assignRole($role1);
        $permission = Permission::create(['name' => 'competencias.create'])->assignRole($role1);
        $permission = Permission::create(['name' => 'competencias.edit'])->assignRole($role1);
        $permission = Permission::create(['name' => 'competencias.destroy'])->assignRole($role1);    
    }
}
