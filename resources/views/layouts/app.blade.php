<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Iannini Jemga Muebles — Artesanos de Lujo desde 1977')</title>
    <meta name="description" content="@yield('description', 'Mobiliario de lujo colombiano para hoteles, residencias y espacios comerciales. Más de 45 años de excelencia artesanal.')">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-negro text-blanco font-body antialiased">

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gris-oscuro py-16 border-t border-dorado/10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">

                <!-- Brand -->
                <div>
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-px bg-dorado"></div>
                        <span class="font-ui text-dorado text-xs tracking-[0.3em] uppercase">Desde 1977</span>
                    </div>
                    <h3 class="font-display text-dorado text-2xl mb-3">Iannini Jemga<br>Muebles</h3>
                    <p class="text-blanco/80 font-body text-sm leading-relaxed">
                        Artesanía de mobiliario de lujo para los<br>
                        espacios más exigentes de Colombia y el mundo.
                    </p>
                </div>

                <!-- Navegación -->
                <div>
                    <h4 class="font-ui text-xs tracking-[0.3em] text-dorado uppercase mb-6">Navegación</h4>
                    <ul class="space-y-3">
                        @foreach ([['inicio', 'Inicio'], ['proyectos', 'Proyectos'], ['nosotros', 'Nosotros'], ['contacto', 'Contacto']] as [$route, $label])
                            <li>
                                <a href="{{ route($route) }}"
                                    class="font-body text-blanco/80 text-sm hover:text-dorado transition-colors">
                                    {{ $label }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Contacto -->
                <div>
                    <h4 class="font-ui text-xs tracking-[0.3em] text-dorado uppercase mb-6">Contacto</h4>
                    <ul class="space-y-3 text-blanco/80 font-body text-sm">
                        <li class="flex items-start gap-2">
                            <span class="text-dorado mt-0.5">↗</span>
                            <span>Bogotá, Colombia</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-dorado mt-0.5">↗</span>
                            <a href="tel:+573144916988" class="hover:text-dorado transition-colors">+57 300 123 4567</a>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-dorado mt-0.5">↗</span>
                            <a href="mailto:muebles.jemga@gmail.com"
                                class="hover:text-dorado transition-colors">muebles.jemga@gmail.com</a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="border-t border-dorado/10 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-blanco/88 font-ui text-xs tracking-widest">
                    © {{ date('Y') }} Iannini Jemga Muebles. Todos los derechos reservados.
                </p>
                <a href="{{ route('whatsapp.flotante') }}"
                    class="font-ui text-xs tracking-widest text-dorado hover:text-dorado-claro transition-colors uppercase">
                    WhatsApp Business →
                </a>
            </div>
        </div>
    </footer>

    @include('components.cta-whatsapp')

</body>

</html>
