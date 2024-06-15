<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Lugar;
use App\Models\User;

class LugarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lugar::create([
            'nombre' => 'Prueba',
            'descripcion' => 'lugar de prueba',
            'ubicacion' => json_encode(['a' => 'b']),
            'menu' => json_encode(['producto' => 'caracoles']),
            'tipo' => 'LugarTuristico',
            'calificacion' => 1.2,
            'user_id' => 5,
        ]);

        Lugar::create([
            'nombre' => 'Prueba2',
            'descripcion' => 'otro lugar de prueba',
            'ubicacion' => json_encode(['a' => 'b']),
            'menu' => json_encode(['producto' => 'caracoles']),
            'tipo' => 'LugarTuristico',
            'calificacion' => 3.3,
            'user_id' => 10,
        ]);

        Lugar::create([
            'nombre' => 'Prueba3',
            'descripcion' => 'otro lugar de prueba',
            'ubicacion' => json_encode(['a' => 'b']),
            'menu' => json_encode(['producto' => 'caracoles']),
            'tipo' => 'LugarTuristico',
            'calificacion' => 4.4,
            'user_id' => 9,
        ]);

        Lugar::create([
            'nombre' => 'Prueba4',
            'descripcion' => 'otro lugar de prueba',
            'ubicacion' => json_encode(['a' => 'b']),
            'menu' => json_encode(['producto' => 'caracoles']),
            'tipo' => 'LugarTuristico',
            'calificacion' => 2.0,
            'user_id' => 8,
        ]);

        Lugar::create([
            'nombre' => 'Los castores Salteñería',
            'descripcion' => 'los castores xddx',
            'ubicacion' => json_encode(['a' => 'b']),
            'menu' => ['1', '2', '3'],
            'tipo' => 'Negocio',
            'calificacion' => 4.0,
            'contacto' => '77711880',
            'user_id' => 13,
        ]);

        Lugar::create([    
            'nombre' => 'Snack Igor',
            'descripcion' => 'Snack Igor',
            'ubicacion' => json_encode(['a' => 'b']),
            'menu' => ['4', '5', '6'],
            'tipo' => 'Negocio',
            'calificacion' => 1.0,
            'contacto' => '12312312',
            'user_id' => 6,
        ]);
    }
}
