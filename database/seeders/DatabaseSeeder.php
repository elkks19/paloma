<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\FavoritoSeeder;
use Database\Seeders\ProductoSeeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\CategoriaSeeder;
use Database\Seeders\LugarSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategoriaSeeder::class,
            LugarSeeder::class,
            FavoritoSeeder::class,
            ReviewSeeder::class,
            RoleSeeder::class,
            ProductoSeeder::class,
        ]);

    }
}
