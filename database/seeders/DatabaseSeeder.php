<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\FavoritoSeeder;
use Database\Seeders\NegocioSeeder;
use Database\Seeders\ProductoSeeder;
use Database\Seeders\ReviewSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            FavoritoSeeder::class,
            NegocioSeeder::class,
            ProductoSeeder::class,
            ReviewSeeder::class
        ]);

    }
}
