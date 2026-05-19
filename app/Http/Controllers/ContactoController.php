<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('pages.contacto');
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'tipo'     => 'nullable|string|max:50',
            'mensaje'  => 'required|string|max:2000',
        ]);

        // Aquí se integra el envío de email cuando se configure el mailer
        return back()->with('success', 'Tu mensaje fue enviado exitosamente. Te contactaremos pronto.');
    }
}
