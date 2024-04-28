<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        Producto::create([
            'nombre' => 'Salteñas de carne',
            'descripcion' => 'Salteñas de carne jugosas y deliciosas',
            'lugar_id' => 4,
            'precio' => 7.0,
        ]);

        Producto::create([
            'nombre' => 'Salteñas de pollo',
            'descripcion' => 'Salteñas de pollo jugosas y deliciosas',
            'lugar_id' => 4,
            'precio' => 7.0,
        ]);

        Producto::create([
            'nombre' => 'Salteñas mixtas',
            'descripcion' => 'Salteñas mixtas de carne y pollo',
            'lugar_id' => 4,
            'precio' => 8.0,
        ]);

        //PRODUCTOS PARA IGOR
        Producto::create([
            'nombre' => 'Hamburguesa simple',
            'descripcion' => 'Hamburguesa simple sin papas',
            'lugar_id' => 5,
            'precio' => 10.0,
        ]);

        Producto::create([
            'nombre' => 'Hamburguesa con queso y papas',
            'descripcion' => 'Hamburguesa simple con queso y papas',
            'lugar_id' => 5,
            'precio' => 15.0,
        ]);

        Producto::create([
            'nombre' => 'Hamburguesa con papas',
            'descripcion' => 'Hamburguesa simple con papas',
            'lugar_id' => 5,
            'precio' => 10.0,
        ]);
    }
}
