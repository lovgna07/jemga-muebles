<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Residencial', 'slug' => 'residencial'],
            ['nombre' => 'Hotelería',   'slug' => 'hoteleria'],
            ['nombre' => 'Comercial',   'slug' => 'comercial'],
        ];

        foreach ($categorias as $categoria) {
            \App\Models\Categoria::firstOrCreate(['slug' => $categoria['slug']], $categoria);
        }
    }
}
