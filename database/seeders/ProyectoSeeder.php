<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hoteleria  = \App\Models\Categoria::where('slug', 'hoteleria')->first()->id;
        $residencial = \App\Models\Categoria::where('slug', 'residencial')->first()->id;
        $comercial  = \App\Models\Categoria::where('slug', 'comercial')->first()->id;

        $proyectos = [
            // Hotelería
            [
                'categoria_id' => $hoteleria,
                'nombre'       => 'Grand Hyatt Bogotá',
                'descripcion'  => 'Más de 300 habitaciones equipadas con frigobar, escritorios ejecutivos y cabeceras en madera de nogal. Proyecto insignia en la capital colombiana.',
                'slug'         => 'grand-hyatt-bogota',
                'imagen'       => 'https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=800&h=600&fit=crop&q=80',
                'imagen_galeria' => json_encode([
                    'https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=800&h=600&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1618219908412-a29a1bb7b86e?w=800&h=600&fit=crop&q=80',
                ]),
                'fecha'        => '2018-07-01',
                'destacado'    => true,
            ],
            [
                'categoria_id' => $hoteleria,
                'nombre'       => 'Hilton Garden Inn Bogotá',
                'descripcion'  => 'Equipamiento integral de 180 habitaciones, lobby principal y áreas comunes. Diseño contemporáneo en madera de teca con acabados dorados.',
                'slug'         => 'hilton-garden-inn-bogota',
                'imagen'       => 'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?w=800&h=600&fit=crop&q=80',
                'imagen_galeria' => null,
                'fecha'        => '2019-03-01',
                'destacado'    => true,
            ],
            [
                'categoria_id' => $hoteleria,
                'nombre'       => 'Sandals Royal Barbados',
                'descripcion'  => 'Mobiliario exclusivo para 250 suites de lujo en el Caribe. Piezas resistentes al ambiente marino con acabados náuticos premium.',
                'slug'         => 'sandals-royal-barbados',
                'imagen'       => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800&h=600&fit=crop&q=80',
                'imagen_galeria' => null,
                'fecha'        => '2017-11-01',
                'destacado'    => true,
            ],
            // Residencial
            [
                'categoria_id' => $residencial,
                'nombre'       => 'Casa Nogales — Bogotá',
                'descripcion'  => 'Diseño integral de sala, comedor, biblioteca y cuatro alcobas. Uso exclusivo de maderas certificadas con tapizados en cuero italiano.',
                'slug'         => 'casa-nogales-bogota',
                'imagen'       => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800&h=600&fit=crop&q=80',
                'imagen_galeria' => null,
                'fecha'        => '2021-05-01',
                'destacado'    => true,
            ],
            [
                'categoria_id' => $residencial,
                'nombre'       => 'Villa Santa Bárbara',
                'descripcion'  => 'Residencia privada de 800 m² en Sopó, Cundinamarca. Mobiliario completo en madera de teca importada con herrerías artesanales.',
                'slug'         => 'villa-santa-barbara',
                'imagen'       => 'https://images.unsplash.com/photo-1613545325278-f24b0cae1224?w=800&h=600&fit=crop&q=80',
                'imagen_galeria' => null,
                'fecha'        => '2022-08-01',
                'destacado'    => true,
            ],
            [
                'categoria_id' => $residencial,
                'nombre'       => 'Apartamentos El Chicó',
                'descripcion'  => 'Equipamiento completo de 45 unidades residenciales de alta gama en el norte de Bogotá. Cocinas, closets y áreas sociales.',
                'slug'         => 'apartamentos-el-chico',
                'imagen'       => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800&h=600&fit=crop&q=80',
                'imagen_galeria' => null,
                'fecha'        => '2020-02-01',
                'destacado'    => false,
            ],
            // Comercial
            [
                'categoria_id' => $comercial,
                'nombre'       => 'Torre Empresarial Andina',
                'descripcion'  => 'Amoblamiento corporativo de 32 pisos: estaciones de trabajo, salas de juntas y zonas de descanso con estética nórdica contemporánea.',
                'slug'         => 'torre-empresarial-andina',
                'imagen'       => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&h=600&fit=crop&q=80',
                'imagen_galeria' => null,
                'fecha'        => '2019-09-01',
                'destacado'    => false,
            ],
            [
                'categoria_id' => $comercial,
                'nombre'       => 'Centro Comercial Santafé',
                'descripcion'  => 'Vitrinas exclusivas, mobiliario de exhibición y áreas de descanso para 15 locales ancla de marcas internacionales de lujo.',
                'slug'         => 'centro-comercial-santafe',
                'imagen'       => 'https://images.unsplash.com/photo-1567016432779-094069958ea5?w=800&h=600&fit=crop&q=80',
                'imagen_galeria' => null,
                'fecha'        => '2016-04-01',
                'destacado'    => false,
            ],
            [
                'categoria_id' => $comercial,
                'nombre'       => 'Oficinas Bancolombia',
                'descripcion'  => 'Más de 500 estaciones de trabajo ergonómicas, salas de liderazgo y zona wellness para la nueva sede corporativa en Medellín.',
                'slug'         => 'oficinas-bancolombia',
                'imagen'       => 'https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=800&h=600&fit=crop&q=80',
                'imagen_galeria' => null,
                'fecha'        => '2023-01-01',
                'destacado'    => true,
            ],
        ];

        foreach ($proyectos as $proyecto) {
            \App\Models\Proyecto::firstOrCreate(['slug' => $proyecto['slug']], $proyecto);
        }
    }
}
