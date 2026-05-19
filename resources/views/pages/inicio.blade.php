@extends('layouts.app')

@section('title', 'Iannini Jemga Muebles — Mobiliario de Lujo desde 1977')
@section('description', 'Portafolio de proyectos de mobiliario de lujo para hoteles, residencias y espacios comerciales en Colombia y el mundo.')

@section('content')

{{-- ═══════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════ --}}
<section class="relative h-screen min-h-[620px] flex items-center justify-center overflow-hidden">

    <!-- BG image -->
    <div class="absolute inset-0 bg-cover bg-center"
         style="background-image:url('https://images.unsplash.com/photo-1618219908412-a29a1bb7b86e?w=1920&q=80')">
    </div>

    <!-- Gradients -->
    <div class="absolute inset-0 bg-negro/70"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-negro/40 via-transparent to-negro/80"></div>

    <!-- Gold frame (desktop) -->
    <div class="absolute inset-8 border border-dorado/15 hidden lg:block pointer-events-none"></div>
    <div class="absolute inset-[34px] border border-dorado/8 hidden lg:block pointer-events-none"></div>

    <!-- Content -->
    <div class="hero-content relative z-10 text-center px-6 max-w-5xl mx-auto">

        <div class="hero-badge inline-flex items-center gap-4 mb-8">
            <div class="w-14 h-px bg-dorado"></div>
            <span class="font-ui text-dorado text-xs tracking-[0.45em] uppercase">Artesanos desde 1977</span>
            <div class="w-14 h-px bg-dorado"></div>
        </div>

        <h1 class="hero-title font-display text-5xl sm:text-6xl md:text-7xl text-blanco leading-[1.1] mb-6">
            Iannini Jemga<br>
            <em class="text-dorado not-italic">Muebles</em>
        </h1>

        <p class="hero-subtitle font-ui text-xs sm:text-sm tracking-[0.4em] uppercase text-blanco/88 mb-3">
            Proyectos Realizados
        </p>
        <p class="font-body italic text-blanco/72 text-lg mb-14">
            Mobiliario de lujo colombiano para el mundo
        </p>

        <div class="hero-cta flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('proyectos') }}" class="btn-dorado py-4 px-12 tracking-[0.3em]">
                Ver Proyectos
            </a>
            <a href="{{ route('nosotros') }}" class="btn-outline-dorado py-4 px-12 tracking-[0.3em]">
                Nuestra Historia
            </a>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="hero-scroll absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-3">
        <div class="scroll-line w-px h-14 bg-gradient-to-b from-dorado/60 to-transparent"></div>
        <span class="font-ui text-[9px] tracking-[0.4em] text-blanco/88 uppercase">Scroll</span>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     STATS
═══════════════════════════════════════════════════ --}}
<section class="bg-gris-oscuro py-20 border-y border-dorado/10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">

            @foreach([
                ['1977', 'Fundados',         0],
                ['500',  'Proyectos',        100],
                ['12',   'Países',           200],
                ['45',   'Años experiencia', 300],
            ] as [$num, $label, $delay])
            <div data-aos="fade-up" data-aos-delay="{{ $delay }}">
                <div class="font-display text-4xl md:text-5xl text-dorado mb-3 leading-none">
                    @if($num !== '1977')+@endif<span data-countup="{{ $num }}">{{ $num }}</span>
                </div>
                <p class="font-ui text-[10px] tracking-[0.3em] text-blanco/72 uppercase">{{ $label }}</p>
            </div>
            @endforeach

        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     PROYECTOS DESTACADOS
═══════════════════════════════════════════════════ --}}
<section class="py-24 bg-negro">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16" data-aos="fade-up">
            <span class="section-label">Portafolio Selecto</span>
            <h2 class="section-title">
                Proyectos <em class="text-dorado not-italic">Destacados</em>
            </h2>
            <div class="w-20 h-px bg-dorado mx-auto mt-6"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($proyectosDestacados as $i => $proyecto)
            <div data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <x-proyecto-card :proyecto="$proyecto" />
            </div>
            @endforeach
        </div>

        <div class="text-center mt-16" data-aos="fade-up">
            <a href="{{ route('proyectos') }}" class="btn-outline-dorado py-4 px-14 tracking-[0.3em]">
                Ver Todos los Proyectos
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     ABOUT TEASER
═══════════════════════════════════════════════════ --}}
<section class="py-24 bg-gris-oscuro">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <!-- Text -->
            <div data-aos="fade-right">
                <span class="section-label">Nuestra Historia</span>
                <h2 class="section-title mb-8">
                    Cuatro décadas de<br><em class="text-dorado not-italic">excelencia artesanal</em>
                </h2>
                <p class="font-body text-blanco/92 text-lg leading-relaxed mb-5">
                    Desde 1977, Iannini Jemga Muebles ha transformado espacios vacíos en obras de arte.
                    Somos una empresa familiar colombiana que ha equipado los más exclusivos hoteles,
                    residencias y espacios comerciales de América.
                </p>
                <p class="font-body text-blanco/75 text-base leading-relaxed mb-10">
                    Cada pieza lleva el sello de la artesanía de alta calidad, donde la tradición
                    colombiana se funde con el diseño contemporáneo de clase mundial.
                </p>
                <a href="{{ route('nosotros') }}"
                   class="font-ui text-xs tracking-[0.3em] uppercase text-dorado border-b border-dorado/40
                          pb-1 hover:border-dorado transition-colors">
                    Conocer más →
                </a>
            </div>

            <!-- Image -->
            <div class="relative" data-aos="fade-left">
                <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800&h=600&fit=crop&q=80"
                     alt="Taller Iannini Jemga Muebles"
                     class="w-full aspect-[4/3] object-cover">
                <div class="absolute -bottom-5 -left-5 w-28 h-28 border-2 border-dorado/50 hidden md:block"></div>
                <div class="absolute -top-5 -right-5 w-20 h-20 bg-dorado/10 border border-dorado/20 hidden md:block"></div>
            </div>

        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     CTA FINAL
═══════════════════════════════════════════════════ --}}
<section class="py-28 bg-negro relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(201,168,76,0.05)_0%,transparent_70%)]"></div>
    <div class="relative z-10 max-w-3xl mx-auto px-6 text-center">

        <div data-aos="fade-up">
            <span class="section-label">Hablemos</span>
            <h2 class="section-title mb-6">
                ¿Tienes un Proyecto<br>
                <em class="text-dorado not-italic">en Mente?</em>
            </h2>
            <div class="w-20 h-px bg-dorado mx-auto mb-10"></div>
            <p class="font-body text-blanco/85 text-xl leading-relaxed mb-12">
                Cuéntanos tu visión y la haremos realidad con la precisión y elegancia
                que nos caracteriza desde hace más de cuatro décadas.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contacto') }}" class="btn-dorado py-4 px-12 tracking-[0.3em]">
                    Contáctanos
                </a>
                <a href="{{ route('whatsapp.flotante') }}"
                   class="font-ui text-xs tracking-[0.3em] uppercase py-4 px-12
                          border border-[#25D366]/50 text-[#25D366] hover:bg-[#25D366] hover:text-white
                          transition-all duration-300 inline-block">
                    WhatsApp Business
                </a>
            </div>
        </div>

    </div>
</section>

@endsection
