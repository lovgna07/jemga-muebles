<?php

namespace App\Http\Controllers;

class ProyectoController extends Controller
{
    public function inicio()
    {
        $proyectosDestacados = \App\Models\Proyecto::with('categoria')
            ->where('destacado', true)
            ->orderBy('fecha', 'desc')
            ->take(6)
            ->get();

        return view('pages.inicio', compact('proyectosDestacados'));
    }

    public function index()
    {
        $proyectos  = \App\Models\Proyecto::with('categoria')
            ->orderByDesc('destacado')
            ->orderBy('fecha', 'desc')
            ->get();

        $categorias = \App\Models\Categoria::all();

        return view('pages.proyectos', compact('proyectos', 'categorias'));
    }
}
