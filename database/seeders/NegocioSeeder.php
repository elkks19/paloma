<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Lugar;
use App\Models\User;
use App\Models\LugarTuristico;

class NegocioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lugar = Lugar::create([
            'nombre' => 'Prueba',
            'descripcion' => 'lugar de prueba',
            'ubicacion' => json_encode(['a' => 'b']),
            'menu' => json_encode(['producto' => 'caracoles']),
            'calificacion' => 1.2,
            'user_id' => 11,
        ]);

        LugarTuristico::create([
            'lugar_id' => 1
        ]);
    }
}
