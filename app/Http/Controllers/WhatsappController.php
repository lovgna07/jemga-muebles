<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    public function flotante()
    {
        $numero  = config('services.whatsapp.numero');
        $mensaje = urlencode('Hola Iannini Jemga Muebles, me gustaría obtener información sobre sus proyectos de mobiliario de lujo.');
        return redirect("https://wa.me/{$numero}?text={$mensaje}");
    }

    public function enviarMensaje(Request $request)
    {
        $numero      = config('services.whatsapp.numero');
        $descripcion = $request->input('descripcion', 'un proyecto de mobiliario');
        $mensaje     = urlencode("Hola Iannini Jemga Muebles, estoy interesado en: {$descripcion}");
        return redirect("https://wa.me/{$numero}?text={$mensaje}");
    }
}
