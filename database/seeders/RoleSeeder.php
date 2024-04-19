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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $adminPerm = Permission::create('*');

        $userPerm = Permission::create(['name' => 'user']);

        $lugaresPerm = Permission::create(['name' => 'lugares']);

        Role::create(['name' => 'admin'])->givePermissionTo($adminPerm);
        Role::create(['name' => 'usuario']);
        Role::create(['name' => 'lugar']);



    }
}
