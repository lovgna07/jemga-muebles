<nav id="navbar"
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 py-5">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">

        <!-- Logo -->
        <a href="{{ route('inicio') }}" class="flex flex-col leading-none">
            <span class="font-display text-dorado text-base tracking-[0.2em] uppercase">Iannini Jemga</span>
            <span class="font-ui text-blanco/72 text-[10px] tracking-[0.4em] uppercase mt-0.5">Muebles · Est. 1977</span>
        </a>

        <!-- Desktop -->
        <div class="hidden md:flex items-center gap-8">
            @foreach([
                ['inicio',    'Inicio'],
                ['proyectos', 'Proyectos'],
                ['nosotros',  'Nosotros'],
                ['contacto',  'Contacto'],
            ] as [$route, $label])
            <a href="{{ route($route) }}"
               class="font-ui text-[11px] tracking-[0.25em] uppercase transition-colors duration-300
                      {{ request()->routeIs($route) ? 'text-dorado' : 'text-blanco/95 hover:text-dorado' }}">
                {{ $label }}
            </a>
            @endforeach

            <a href="{{ route('whatsapp.flotante') }}"
               class="btn-dorado py-2 px-5 font-ui text-[10px] tracking-[0.25em]">
                Cotizar
            </a>
        </div>

        <!-- Mobile toggle -->
        <button id="mobile-toggle"
                class="md:hidden text-blanco/95 hover:text-dorado transition-colors"
                aria-label="Abrir menú">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path id="icon-open"  stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                <path id="icon-close" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" class="hidden"/>
            </svg>
        </button>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu"
         class="md:hidden hidden bg-gris-oscuro/95 backdrop-blur border-t border-dorado/10 mt-4">
        <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col gap-5">
            @foreach([
                ['inicio',    'Inicio'],
                ['proyectos', 'Proyectos'],
                ['nosotros',  'Nosotros'],
                ['contacto',  'Contacto'],
            ] as [$route, $label])
            <a href="{{ route($route) }}"
               class="font-ui text-xs tracking-[0.25em] uppercase
                      {{ request()->routeIs($route) ? 'text-dorado' : 'text-blanco/95 hover:text-dorado' }}
                      transition-colors">
                {{ $label }}
            </a>
            @endforeach
            <a href="{{ route('whatsapp.flotante') }}" class="btn-dorado text-center mt-2">
                Cotizar Proyecto
            </a>
        </div>
    </div>
</nav>

<script>
document.getElementById('mobile-toggle').addEventListener('click', function () {
    const menu  = document.getElementById('mobile-menu');
    const open  = document.getElementById('icon-open');
    const close = document.getElementById('icon-close');
    menu.classList.toggle('hidden');
    open.classList.toggle('hidden');
    close.classList.toggle('hidden');
});
</script>
