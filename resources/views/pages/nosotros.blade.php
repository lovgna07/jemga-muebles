@extends('layouts.app')

@section('title', 'Nosotros — Iannini Jemga Muebles')
@section('description', 'Conoce la historia de Iannini Jemga Muebles, empresa familiar colombiana de mobiliario de lujo fundada en 1977.')

@section('content')

<div class="pt-20">

    {{-- ═══════════════════════════════════════════════════
         HEADER HERO
    ═══════════════════════════════════════════════════ --}}
    <section class="relative h-[60vh] min-h-[480px] flex items-center overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center"
             style="background-image:url('https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=1920&q=80')">
        </div>
        <div class="absolute inset-0 bg-negro/75"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-negro/90 via-negro/60 to-transparent"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6">
            <span class="section-label" data-aos="fade-up">Quiénes Somos</span>
            <h1 class="font-display text-5xl md:text-6xl text-blanco max-w-xl leading-tight" data-aos="fade-up" data-aos-delay="100">
                Una familia,<br>
                <em class="text-dorado not-italic">una pasión</em>
            </h1>
            <div class="w-20 h-px bg-dorado mt-6" data-aos="fade-up" data-aos-delay="200"></div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════
         HISTORIA
    ═══════════════════════════════════════════════════ --}}
    <section class="py-24 bg-negro">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">

                <!-- Imagen -->
                <div class="relative order-2 lg:order-1" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=800&h=700&fit=crop&q=80"
                         alt="Historia Iannini Jemga"
                         class="w-full aspect-[3/4] object-cover">
                    <div class="absolute -bottom-6 -right-6 bg-dorado p-6 text-negro hidden lg:block">
                        <div class="font-display text-4xl font-bold leading-none">45+</div>
                        <div class="font-ui text-[10px] tracking-widest uppercase mt-1">Años de historia</div>
                    </div>
                </div>

                <!-- Texto -->
                <div class="order-1 lg:order-2" data-aos="fade-left">
                    <span class="section-label">Nuestra Historia</span>
                    <h2 class="section-title mb-8">
                        Bogotá, 1977.<br>
                        <em class="text-dorado not-italic">Un sueño artesanal</em>
                    </h2>
                    <div class="space-y-5 font-body text-blanco/92 text-lg leading-relaxed">
                        <p>
                            Todo comenzó en un pequeño taller en el corazón de Bogotá, cuando la familia Iannini
                            decidió convertir su amor por la madera y el diseño en una empresa. Con herramientas
                            manuales y una visión clara de calidad, comenzaron a crear piezas que pronto captaron
                            la atención de los espacios más exclusivos de la capital.
                        </p>
                        <p>
                            Con el paso de los años, crecimos en capacidad pero nunca perdimos nuestra esencia
                            artesanal. Hoy, casi cinco décadas después, seguimos siendo una empresa familiar que
                            trata cada proyecto con la misma atención y pasión del primer día.
                        </p>
                        <p>
                            Nuestro trabajo ha cruzado fronteras: hoteles en el Caribe, residencias en Panamá,
                            y espacios corporativos en toda Colombia llevan nuestra firma.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════
         VALORES
    ═══════════════════════════════════════════════════ --}}
    <section class="py-24 bg-gris-oscuro">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-16" data-aos="fade-up">
                <span class="section-label">Lo que nos define</span>
                <h2 class="section-title">
                    Nuestros <em class="text-dorado not-italic">Valores</em>
                </h2>
                <div class="w-20 h-px bg-dorado mx-auto mt-6"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                @foreach([
                    ['I',  'Artesanía',      'Cada pieza es elaborada a mano con maderas certificadas y acabados que perduran generaciones.'],
                    ['II', 'Exclusividad',   'Diseñamos para espacios únicos. Ningún proyecto se repite; cada obra es irrepetible.'],
                    ['III','Tradición',      'Cuatro generaciones de conocimiento artesanal transmitido de padres a hijos con orgullo.'],
                    ['IV', 'Innovación',     'Combinamos técnicas ancestrales con diseño contemporáneo y materiales de vanguardia.'],
                ] as [$num, $title, $desc])
                <div class="border border-dorado/15 p-8 hover:border-dorado/40 transition-all duration-500 group"
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="font-ui text-dorado/55 text-3xl mb-5 font-light group-hover:text-dorado transition-colors">
                        {{ $num }}
                    </div>
                    <h3 class="font-display text-blanco text-xl mb-4">{{ $title }}</h3>
                    <p class="font-body text-blanco/75 text-sm leading-relaxed">{{ $desc }}</p>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════
         TIMELINE
    ═══════════════════════════════════════════════════ --}}
    <section class="py-24 bg-negro">
        <div class="max-w-5xl mx-auto px-6">

            <div class="text-center mb-16" data-aos="fade-up">
                <span class="section-label">Nuestra trayectoria</span>
                <h2 class="section-title">
                    Hitos que nos<br>
                    <em class="text-dorado not-italic">definen</em>
                </h2>
                <div class="w-20 h-px bg-dorado mx-auto mt-6"></div>
            </div>

            <div class="relative">
                <!-- Línea central -->
                <div class="absolute left-1/2 top-0 bottom-0 w-px bg-dorado/15 hidden md:block"></div>

                <div class="space-y-12">
                    @foreach([
                        ['1977', 'Fundación',                'La familia Iannini abre su primer taller en Bogotá con un equipo de cuatro artesanos.',           'right'],
                        ['1985', 'Primer gran proyecto',     'Equipamiento de las suites VIP del Hotel Tequendama, nuestro primer gran proyecto hotelero.',     'left'],
                        ['1995', 'Expansión al Caribe',      'Cruzamos fronteras: primer proyecto internacional en Cartagena de Indias y el archipiélago.',     'right'],
                        ['2000', 'Certificación de calidad', 'Obtenemos reconocimiento del Ministerio de Comercio como empresa de excelencia artesanal.',        'left'],
                        ['2010', '300 proyectos',            'Celebramos nuestro proyecto número 300, con clientes en 8 países de América.',                     'right'],
                        ['2018', 'Grand Hyatt Bogotá',       'Proyecto insignia: más de 300 habitaciones del Grand Hyatt Bogotá llevan nuestro sello.',         'left'],
                        ['2023', '+500 proyectos',           'Superamos los 500 proyectos realizados. Bogotá, Medellín, Caribe y más allá.',                     'right'],
                    ] as [$year, $title, $desc, $side])
                    <div class="relative grid md:grid-cols-2 gap-8 items-center
                                {{ $side === 'right' ? '' : 'direction-rtl' }}"
                         data-aos="{{ $side === 'right' ? 'fade-right' : 'fade-left' }}">

                        @if($side === 'right')
                        <div class="text-right hidden md:block">
                            <span class="font-display text-dorado text-4xl">{{ $year }}</span>
                        </div>
                        <div class="md:pl-12 border-l border-dorado/20 pl-6 relative">
                            <div class="absolute -left-[5px] top-2 w-2.5 h-2.5 rounded-full bg-dorado hidden md:block"></div>
                            <span class="font-ui text-dorado text-xs tracking-widest uppercase block mb-1 md:hidden">{{ $year }}</span>
                            <h3 class="font-display text-blanco text-xl mb-2">{{ $title }}</h3>
                            <p class="font-body text-blanco/80 text-sm leading-relaxed">{{ $desc }}</p>
                        </div>
                        @else
                        <div class="md:pr-12 md:text-right border-l border-dorado/20 pl-6 md:border-l-0 md:border-r md:pr-12 relative">
                            <div class="absolute -right-[5px] top-2 w-2.5 h-2.5 rounded-full bg-dorado hidden md:block"></div>
                            <span class="font-ui text-dorado text-xs tracking-widest uppercase block mb-1 md:hidden">{{ $year }}</span>
                            <h3 class="font-display text-blanco text-xl mb-2">{{ $title }}</h3>
                            <p class="font-body text-blanco/80 text-sm leading-relaxed">{{ $desc }}</p>
                        </div>
                        <div class="hidden md:block">
                            <span class="font-display text-dorado text-4xl">{{ $year }}</span>
                        </div>
                        @endif

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════
         STATS ANIMADOS
    ═══════════════════════════════════════════════════ --}}
    <section class="py-24 bg-gris-oscuro border-y border-dorado/10">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            @foreach([
                ['500',  'Proyectos realizados',    0],
                ['12',   'Países de presencia',    100],
                ['3',    'Generaciones activas',   200],
                ['100',  'Artesanos de oficio',    300],
            ] as [$num, $label, $delay])
            <div data-aos="fade-up" data-aos-delay="{{ $delay }}">
                <div class="font-display text-5xl text-dorado mb-3">
                    +<span data-countup="{{ $num }}">{{ $num }}</span>
                </div>
                <p class="font-ui text-[10px] tracking-[0.3em] text-blanco/72 uppercase leading-relaxed">
                    {{ $label }}
                </p>
            </div>
            @endforeach
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-24 bg-negro text-center">
        <div class="max-w-xl mx-auto px-6" data-aos="fade-up">
            <span class="section-label">Trabajemos juntos</span>
            <h2 class="section-title mb-10">
                Tu proyecto es<br>
                <em class="text-dorado not-italic">nuestra obra</em>
            </h2>
            <a href="{{ route('contacto') }}" class="btn-dorado py-4 px-14 tracking-[0.3em]">
                Solicitar Cotización
            </a>
        </div>
    </section>

</div>
@endsection
