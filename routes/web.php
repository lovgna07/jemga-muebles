<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\WhatsappController;

Route::get('/',           [ProyectoController::class,  'inicio'])->name('inicio');
Route::get('/proyectos',  [ProyectoController::class,  'index'])->name('proyectos');
Route::get('/nosotros',   fn() => view('pages.nosotros'))->name('nosotros');
Route::get('/contacto',   [ContactoController::class,  'index'])->name('contacto');
Route::post('/contacto',  [ContactoController::class,  'enviar'])->name('contacto.enviar');
Route::get('/whatsapp',   [WhatsappController::class,  'flotante'])->name('whatsapp.flotante');
Route::post('/whatsapp',  [WhatsappController::class,  'enviarMensaje'])->name('whatsapp.mensaje');
