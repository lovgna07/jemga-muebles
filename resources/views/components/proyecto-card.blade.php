@props(['proyecto'])

<div class="card-proyecto" data-aos="fade-up">

    <!-- Image -->
    <div class="relative aspect-[4/3] overflow-hidden">
        <img src="{{ $proyecto->imagen_url }}"
             alt="{{ $proyecto->nombre }}"
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
             loading="lazy">

        <!-- Hover overlay -->
        <div class="absolute inset-0 bg-dorado/92 flex items-center justify-center
                    opacity-0 group-hover:opacity-100 transition-all duration-500">
            <div class="text-center text-negro px-6
                        translate-y-3 group-hover:translate-y-0 transition-transform duration-500">
                <h3 class="font-display text-xl font-semibold mb-3">{{ $proyecto->nombre }}</h3>
                <p class="font-body text-sm leading-relaxed line-clamp-3">{{ $proyecto->descripcion }}</p>
            </div>
        </div>

        <!-- Category badge -->
        <div class="absolute top-4 left-4
                    bg-negro/80 backdrop-blur border border-dorado/30
                    px-3 py-1 font-ui text-dorado text-[10px] tracking-widest uppercase">
            {{ $proyecto->categoria->nombre }}
        </div>
    </div>

    <!-- Info -->
    <div class="p-5 border-t border-dorado/10 group-hover:border-dorado/30 transition-colors duration-500">
        <div class="flex items-center justify-between mb-2">
            <span class="font-ui text-dorado text-[10px] tracking-widest uppercase">
                {{ $proyecto->fecha->translatedFormat('Y') }}
            </span>
            @if($proyecto->destacado)
            <span class="font-ui text-[9px] tracking-widest text-dorado uppercase border border-dorado/40 px-2 py-0.5">
                Destacado
            </span>
            @endif
        </div>
        <h3 class="font-display text-blanco text-lg leading-tight mb-2">{{ $proyecto->nombre }}</h3>
        <p class="font-body text-blanco/75 text-sm leading-relaxed line-clamp-2">{{ $proyecto->descripcion }}</p>
    </div>

</div>
