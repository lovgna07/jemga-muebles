@extends('layouts.app')

@section('title', 'Contacto — Iannini Jemga Muebles')
@section('description',
    'Contáctanos para cotizar tu proyecto de mobiliario de lujo. Hotelería, residencial y
    comercial.')

@section('content')

    <div class="pt-20">

        {{-- ═══════════════════════════════════════════════════
         HEADER
    ═══════════════════════════════════════════════════ --}}
        <section class="relative py-28 bg-gris-oscuro border-b border-dorado/10 overflow-hidden">
            <div
                class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(201,168,76,0.07)_0%,transparent_60%)]">
            </div>
            <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
                <span class="section-label" data-aos="fade-up">Hablemos</span>
                <h1 class="font-display text-5xl md:text-6xl text-blanco mb-6" data-aos="fade-up" data-aos-delay="100">
                    ¿Tienes un Proyecto<br>
                    <em class="text-dorado not-italic">en Mente?</em>
                </h1>
                <div class="w-20 h-px bg-dorado mx-auto mb-6" data-aos="fade-up" data-aos-delay="200"></div>
                <p class="font-body text-blanco/80 text-lg max-w-xl mx-auto leading-relaxed" data-aos="fade-up"
                    data-aos-delay="300">
                    Cuéntanos tu visión. Diseñamos y construimos el mobiliario exacto
                    que tu espacio merece.
                </p>
            </div>
        </section>

        {{-- ═══════════════════════════════════════════════════
         FORMULARIO + CONTACTO
    ═══════════════════════════════════════════════════ --}}
        <section class="py-24 bg-negro">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-16">

                    {{-- Formulario (3/5) --}}
                    <div class="lg:col-span-3" data-aos="fade-right">

                        @if (session('success'))
                            <div class="mb-8 border border-dorado/40 bg-dorado/10 px-6 py-4">
                                <p class="font-ui text-dorado text-xs tracking-widest uppercase">
                                    {{ session('success') }}
                                </p>
                            </div>
                        @endif

                        <form action="{{ route('contacto.enviar') }}" method="POST" class="space-y-6">
                            @csrf

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label class="font-ui text-[10px] tracking-[0.3em] text-dorado uppercase block mb-2">
                                        Nombre *
                                    </label>
                                    <input type="text" name="nombre" value="{{ old('nombre') }}"
                                        class="input-luxury @error('nombre') border-red-500/50 @enderror"
                                        placeholder="Tu nombre completo">
                                    @error('nombre')
                                        <p class="font-ui text-red-400/70 text-[10px] tracking-wider mt-1">{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="font-ui text-[10px] tracking-[0.3em] text-dorado uppercase block mb-2">
                                        Email *
                                    </label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="input-luxury @error('email') border-red-500/50 @enderror"
                                        placeholder="tu@email.com">
                                    @error('email')
                                        <p class="font-ui text-red-400/70 text-[10px] tracking-wider mt-1">{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label class="font-ui text-[10px] tracking-[0.3em] text-dorado uppercase block mb-2">
                                        Teléfono
                                    </label>
                                    <input type="tel" name="telefono" value="{{ old('telefono') }}" class="input-luxury"
                                        placeholder="+57 300 000 0000">
                                </div>

                                <div>
                                    <label class="font-ui text-[10px] tracking-[0.3em] text-dorado uppercase block mb-2">
                                        Tipo de Proyecto
                                    </label>
                                    <select name="tipo" class="input-luxury">
                                        <option value="" class="bg-gris-medio">Seleccionar...</option>
                                        <option value="Residencial" class="bg-gris-medio"
                                            {{ old('tipo') === 'Residencial' ? 'selected' : '' }}>Residencial</option>
                                        <option value="Hotelería" class="bg-gris-medio"
                                            {{ old('tipo') === 'Hotelería' ? 'selected' : '' }}>Hotelería</option>
                                        <option value="Comercial" class="bg-gris-medio"
                                            {{ old('tipo') === 'Comercial' ? 'selected' : '' }}>Comercial</option>
                                        <option value="Otro" class="bg-gris-medio"
                                            {{ old('tipo') === 'Otro' ? 'selected' : '' }}>Otro</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="font-ui text-[10px] tracking-[0.3em] text-dorado uppercase block mb-2">
                                    Descripción del Proyecto *
                                </label>
                                <textarea name="mensaje" rows="6" class="input-luxury resize-none @error('mensaje') border-red-500/50 @enderror"
                                    placeholder="Cuéntanos sobre tu proyecto: espacio, estilo, materiales, cronograma...">{{ old('mensaje') }}</textarea>
                                @error('mensaje')
                                    <p class="font-ui text-red-400/70 text-[10px] tracking-wider mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col sm:flex-row gap-4">
                                <button type="submit"
                                    class="btn-dorado py-4 px-12 tracking-[0.3em] flex-1 sm:flex-none text-center">
                                    Enviar Mensaje
                                </button>
                                <a href="{{ route('whatsapp.flotante') }}"
                                    class="font-ui text-xs tracking-[0.25em] uppercase py-4 px-10
                                      border border-[#25D366]/40 text-[#25D366] hover:bg-[#25D366] hover:text-white
                                      transition-all duration-300 text-center inline-block">
                                    WhatsApp
                                </a>
                            </div>

                        </form>
                    </div>

                    {{-- Info (2/5) --}}
                    <div class="lg:col-span-2" data-aos="fade-left">

                        <div class="space-y-8">

                            <div>
                                <h3 class="font-display text-dorado text-2xl mb-6">
                                    Información de Contacto
                                </h3>
                            </div>

                            @foreach ([
            [
                'Ubicación',
                'Bogotá, Colombia<br>Calle 69 a # 90-25
        , Chapinero',
            ],
            ['Teléfono', '+57 314 4916988<br>+57 1 234 5678'],
            ['Email', 'muebles.jemga@gmail.com<br>proyectos@iannini.com.co'],
            ['Horario', 'Lunes – Viernes: 8am – 6pm<br>Sábados: 9am – 2pm'],
        ] as [$label, $value])
                                <div class="border-b border-dorado/10 pb-6">
                                    <p class="font-ui text-[10px] tracking-[0.35em] text-dorado uppercase mb-2">
                                        {{ $label }}
                                    </p>
                                    <p class="font-body text-blanco/95 text-base leading-relaxed">
                                        {!! $value !!}
                                    </p>
                                </div>
                            @endforeach

                        </div>

                        <!-- WhatsApp destacado -->
                        <div class="mt-10 border border-[#25D366]/20 bg-[#25D366]/5 p-6">
                            <p class="font-ui text-[10px] tracking-widest text-[#25D366]/70 uppercase mb-3">
                                Respuesta inmediata
                            </p>
                            <p class="font-body text-blanco/88 text-sm leading-relaxed mb-5">
                                Contáctanos directo por WhatsApp Business.

                            </p>
                            <a href="{{ route('whatsapp.flotante') }}"
                                class="w-full py-3 px-6 bg-[#25D366] hover:bg-[#1db954] text-white
                                  font-ui text-xs tracking-[0.25em] uppercase transition-colors
                                  flex items-center justify-center gap-3">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                Escribir por WhatsApp
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        {{-- ═══════════════════════════════════════════════════
         COTIZACIÓN / WOMPI (estructura preparada)
    ═══════════════════════════════════════════════════
        <section class="py-24 bg-gris-oscuro border-t border-dorado/10">
            <div class="max-w-4xl mx-auto px-6">

                <div class="text-center mb-12" data-aos="fade-up">
                    <span class="section-label">Pago en línea</span>
                    <h2 class="section-title mb-4">
                        Abono de <em class="text-dorado not-italic">Cotización</em>
                    </h2>
                    <div class="w-20 h-px bg-dorado mx-auto mt-4 mb-6"></div>
                    <p class="font-body text-blanco/80 text-lg leading-relaxed max-w-xl mx-auto">
                        Para confirmar tu proyecto puedes realizar un abono en línea de forma segura
                        a través de Wompi. Aceptamos tarjetas, PSE y transferencias.
                    </p>
                </div>

                <!-- Wompi widget placeholder -->
                <div class="border border-dorado/15 bg-negro/60 p-10 text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="inline-flex items-center gap-3 mb-6">
                        <div class="w-8 h-px bg-dorado/40"></div>
                        <span class="font-ui text-[10px] tracking-[0.4em] text-dorado/70 uppercase">Próximamente</span>
                        <div class="w-8 h-px bg-dorado/40"></div>
                    </div>
                    <p class="font-display text-blanco/92 text-xl mb-2">Portal de Pagos Wompi</p>
                    <p class="font-body text-blanco/88 text-sm leading-relaxed">
                        El módulo de pagos en línea estará disponible próximamente.<br>
                        Por ahora, coordina tu pago directamente con nuestro equipo.
                    </p>

                    <!-- Métodos de pago aceptados -->
                    <div class="flex flex-wrap items-center justify-center gap-4 mt-8">
                        @foreach (['PSE', 'Visa', 'Mastercard', 'Nequi', 'Daviplata'] as $metodo)
                            <span
                                class="border border-dorado/15 px-4 py-2 font-ui text-[10px] tracking-widest text-blanco/92 uppercase">
                                {{ $metodo }}
                            </span>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    ═══════════════════════════════════════════════════ --}}

    </div>
@endsection
