<?php

namespace Database\Seeders;

use App\Models\User;
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

        $permission = Permission::create(['name' => 'prueba']);

        $role = Role::create(['name' => 'user']);
        $role = Role::create(['name' => 'lugar']);

        $role->givePermissionTo($permission);

        $user = User::find(11);
        $user->assignRole('user');

        $user = User::find(12);
        $user->assignRole('lugar');
    }
}
