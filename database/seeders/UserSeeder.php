<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'user']);
        Role::create(['name' => 'lugar']);


        User::factory(10)->create();

        User::create([
            'name' => 'Rafael Fabiani',
            'email' => 'rafafabiani1909@gmail.com',
            'password' => Hash::make('asdf1234'),
        ])->assignRole('user');

        User::create([
            'name' => 'Rafael Osinaga',
            'email' => 'rafa@gmail.com',
            'password' => Hash::make('asdf1234'),
        ])->assignRole('user');

        User::create([
            'name' => 'Jesus Iriarte',
            'email' => 'jes@gmail.com',
            'password' => Hash::make('asdf1234'),
        ])->assignRole('lugar');

        User::create([
            'name' => 'Ale Papaya',
            'email' => 'ale@gmail.com',
            'password' => Hash::make('asdf1234'),
        ])->assignRole('lugar');
    }
}
