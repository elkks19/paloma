<?php

namespace Database\Seeders;

use App\Models\Favorito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoritoSeeder extends Seeder
{
    public function run(): void
    {
        Favorito::create([
            'user_id' => 11,
            'lugar_id' => 1
        ]);

        Favorito::create([
            'user_id' => 11,
            'lugar_id' => 2
        ]);

        Favorito::create([
            'user_id' => 11,
            'lugar_id' => 3
        ]);

        Favorito::create([
            'user_id' => 11,
            'lugar_id' => 4
        ]);

        Favorito::create([
            'user_id' => 11,
            'lugar_id' => 5
        ]);
    }
}
