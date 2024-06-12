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
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'usuario']);
        Permission::create(['name' => 'dashboard'])->assignRole($role1,$role2);
        Permission::create(['name' => 'datos'])->assignRole($role1,$role2);
        Permission::create(['name' => 'reportes'])->assignRole($role1,$role2);
        Permission::create(['name' => 'modificacion'])->assignRole($role1);
      
    }
}
