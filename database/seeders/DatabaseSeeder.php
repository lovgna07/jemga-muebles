<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            CategoriaSeeder::class,
            ProyectoSeeder::class,
        ]);

        // Usuario admin para Filament — solo si no existe
        $email = env('ADMIN_EMAIL', 'admin@iannini.com.co');

        User::firstOrCreate(
            ['email' => $email],
            [
                'name'     => env('ADMIN_NAME', 'Administrador'),
                'password' => Hash::make(env('ADMIN_PASSWORD', 'changeme123')),
            ]
        );
    }
}
