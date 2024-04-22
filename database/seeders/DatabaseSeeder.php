<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\FavoritoSeeder;
use Database\Seeders\NegocioSeeder;
use Database\Seeders\ProductoSeeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\CategoriaSeeder;
use Database\Seeders\LugarSeeder;
use Database\Seeders\LugarTuristicoSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            NegocioSeeder::class,
            CategoriaSeeder::class,
            FavoritoSeeder::class,
            LugarSeeder::class,
            LugarTuristicoSeeder::class,
            ProductoSeeder::class,
            ReviewSeeder::class,
            RoleSeeder::class,
        ]);

    }
}
