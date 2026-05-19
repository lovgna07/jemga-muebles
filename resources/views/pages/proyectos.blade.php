@extends('layouts.app')

@section('title', 'Proyectos — Iannini Jemga Muebles')
@section('description', 'Portafolio completo de proyectos de mobiliario de lujo: hotelería, residencial y comercial.')

@section('content')

<div class="pt-20">

    {{-- ═══════════════════════════════════════════════════
         HEADER
    ═══════════════════════════════════════════════════ --}}
    <section class="relative py-28 bg-gris-oscuro border-b border-dorado/10 overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(201,168,76,0.06)_0%,transparent_60%)]"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
            <span class="section-label">Portafolio</span>
            <h1 class="font-display text-5xl md:text-6xl text-blanco mb-6">
                Nuestros <em class="text-dorado not-italic">Proyectos</em>
            </h1>
            <div class="w-20 h-px bg-dorado mx-auto mb-6"></div>
            <p class="font-body text-blanco/85 text-lg max-w-xl mx-auto leading-relaxed">
                Cada proyecto es una obra única que refleja nuestra pasión
                por la excelencia y el detalle artesanal.
            </p>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════
         GRID CON FILTRO ALPINE.JS
    ═══════════════════════════════════════════════════ --}}
    <section class="py-20 bg-negro"
             x-data="{
                 filtro: 'todos',
                 proyectos: {{ Js::from($proyectos) }},
                 get filtrados() {
                     if (this.filtro === 'todos') return this.proyectos;
                     return this.proyectos.filter(p => p.categoria.slug === this.filtro);
                 }
             }">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Filtros -->
            <div class="flex flex-wrap gap-3 justify-center mb-16">

                <button @click="filtro = 'todos'"
                        :class="filtro === 'todos'
                            ? 'bg-dorado text-negro'
                            : 'border border-dorado/30 text-blanco/85 hover:border-dorado hover:text-dorado'"
                        class="font-ui text-[11px] tracking-[0.25em] uppercase py-2.5 px-7 transition-all duration-300">
                    Todos
                </button>

                @foreach($categorias as $cat)
                <button @click="filtro = '{{ $cat->slug }}'"
                        :class="filtro === '{{ $cat->slug }}'
                            ? 'bg-dorado text-negro'
                            : 'border border-dorado/30 text-blanco/85 hover:border-dorado hover:text-dorado'"
                        class="font-ui text-[11px] tracking-[0.25em] uppercase py-2.5 px-7 transition-all duration-300">
                    {{ $cat->nombre }}
                </button>
                @endforeach

            </div>

            <!-- Contador -->
            <p class="text-center font-ui text-[10px] tracking-[0.3em] text-blanco/88 uppercase mb-10">
                <span x-text="filtrados.length"></span> proyectos
            </p>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="p in filtrados" :key="p.id">
                    <div class="group relative overflow-hidden bg-gris-oscuro border border-dorado/10
                                hover:border-dorado/40 transition-all duration-500">

                        <!-- Image -->
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img :src="p.imagen_url"
                                 :alt="p.nombre"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                 loading="lazy">

                            <!-- Hover overlay -->
                            <div class="absolute inset-0 bg-dorado/92 flex items-center justify-center
                                        opacity-0 group-hover:opacity-100 transition-all duration-500">
                                <div class="text-center text-negro px-6
                                            translate-y-3 group-hover:translate-y-0 transition-transform duration-500">
                                    <h3 class="font-display text-xl font-semibold mb-3" x-text="p.nombre"></h3>
                                    <p class="font-body text-sm leading-relaxed" x-text="p.descripcion"></p>
                                </div>
                            </div>

                            <!-- Category badge -->
                            <div class="absolute top-4 left-4 bg-negro/80 backdrop-blur border border-dorado/30
                                        px-3 py-1 font-ui text-dorado text-[10px] tracking-widest uppercase"
                                 x-text="p.categoria.nombre">
                            </div>
                        </div>

                        <!-- Info -->
                        <div class="p-5 border-t border-dorado/10 group-hover:border-dorado/30 transition-colors duration-500">
                            <div class="flex items-center justify-between mb-2">
                                <span class="font-ui text-dorado text-[10px] tracking-widest uppercase"
                                      x-text="p.fecha ? p.fecha.substring(0,4) : ''">
                                </span>
                                <span x-show="p.destacado"
                                      class="font-ui text-[9px] tracking-widest text-dorado uppercase border border-dorado/40 px-2 py-0.5">
                                    Destacado
                                </span>
                            </div>
                            <h3 class="font-display text-blanco text-lg leading-tight mb-2" x-text="p.nombre"></h3>
                            <p class="font-body text-blanco/75 text-sm leading-relaxed line-clamp-2" x-text="p.descripcion"></p>
                        </div>

                    </div>
                </template>
            </div>

            <!-- Sin resultados -->
            <div x-show="filtrados.length === 0"
                 x-transition
                 class="text-center py-24">
                <p class="font-body text-blanco/92 text-lg italic">No hay proyectos en esta categoría.</p>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════
         CTA FINAL
    ═══════════════════════════════════════════════════ --}}
    <section class="py-24 bg-gris-oscuro border-t border-dorado/10 text-center">
        <div class="max-w-2xl mx-auto px-6">
            <span class="section-label">¿Listo para empezar?</span>
            <h2 class="section-title mb-6">
                Tu espacio merece<br>
                <em class="text-dorado not-italic">lo mejor</em>
            </h2>
            <div class="w-20 h-px bg-dorado mx-auto mb-10"></div>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contacto') }}" class="btn-dorado py-4 px-12 tracking-[0.3em]">
                    Solicitar Cotización
                </a>
                <a href="{{ route('whatsapp.flotante') }}"
                   class="font-ui text-xs tracking-[0.3em] uppercase py-4 px-12
                          border border-[#25D366]/50 text-[#25D366] hover:bg-[#25D366] hover:text-white
                          transition-all duration-300 inline-block">
                    WhatsApp
                </a>
            </div>
        </div>
    </section>

</div>
@endsection
