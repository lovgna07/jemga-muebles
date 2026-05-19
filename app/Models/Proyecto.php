<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Proyecto extends Model
{
    protected $fillable = [
        'categoria_id', 'nombre', 'descripcion', 'slug',
        'imagen', 'imagen_galeria', 'fecha', 'destacado',
    ];

    protected $casts = [
        'imagen_galeria' => 'array',
        'fecha'          => 'date',
        'destacado'      => 'boolean',
    ];

    // Incluido en JSON para que Alpine.js lo reciba correctamente
    protected $appends = ['imagen_url'];

    protected function imagenUrl(): Attribute
    {
        return Attribute::get(function () {
            $img = $this->imagen;
            if (!$img) return null;
            // Si ya es URL externa (http/https), la devuelve tal cual
            if (str_starts_with($img, 'http')) return $img;
            // Si es ruta local de storage, genera la URL pública
            return Storage::disk('public')->url($img);
        });
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
