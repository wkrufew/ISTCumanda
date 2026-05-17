<x-app-layout>
    @section('title', '| ' . $course->title)
    @section('description', Str::limit($course->description, 160))
    @section('keywords', 'educación, cursos, ' . $course->category->name . ', ' . $course->title)
    @section('url', route('course.show', $course))
    @section('img', $course->image ? Storage::url($course->image->url) : asset('imagenes/IST_LOGO.webp'))

    @section('og-tags')
        <meta property="og:url" content="{{ route('course.show', $course) }}">
        <meta property="og:type" content="article">
    @endsection

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .hero-bg { background: linear-gradient(135deg, #0e1f05 0%, #1a3a07 45%, #1f0a2e 100%); }
        .swiper { width: auto; height: 200px; }
        .swiper-slide { display: flex; align-items: center; }
        .tarjeta-carrito { bottom: -220px; visibility: hidden; transition: .8s; }
        @media (max-width: 768px) {
            .tarjeta-carrito.active { bottom: 0; visibility: visible; }
        }
        .botonpro { animation: pulse-morado 2s infinite; }
        @keyframes pulse-morado {
            0%   { box-shadow: 0 0 0 0 #84219fa0; }
            70%  { box-shadow: 0 0 0 10px #84219f00; }
            100% { box-shadow: 0 0 0 0 #84219f00; }
        }
        .section-header { border-left: 3px solid; padding-left: 0.75rem; }
    </style>

    @php
        $fecha = now()->format('Y-m-d H:i:s');
        $waMensaje = urlencode("Hola IST Cumandá,\n\nEstoy interesado/a en conocer más sobre: *{$course->title}*.\n\nAgradezco su atención y espero recibir información sobre admisión y matrícula.\n\nFecha: {$fecha}.");
        $displayLinks = $course->links ?? [];
    @endphp

    {{-- ══════════════ HERO ══════════════ --}}
    <div class="hero-bg -mt-20 pt-20 relative overflow-hidden">
        {{-- Decoración de fondo --}}
        <div class="absolute top-0 right-0 w-[500px] h-[500px] rounded-full opacity-[0.07]"
            style="background: radial-gradient(circle, #7ea41e, transparent); transform: translate(35%, -35%);"></div>
        <div class="absolute bottom-0 left-10 w-64 h-64 rounded-full opacity-[0.06]"
            style="background: radial-gradient(circle, #e59e20, transparent);"></div>

        <div class="max-w-6xl mx-auto px-4 pt-8 pb-0">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

                {{-- Imagen --}}
                <div class="order-1 lg:order-2 relative">
                    <div class="absolute inset-0 rounded-2xl opacity-60"
                        style="background: linear-gradient(135deg,#7ea41e,#e59e20); transform: translate(6px,6px); border-radius:1rem;"></div>
                    <img class="relative w-full h-72 lg:h-80 object-cover rounded-2xl shadow-2xl"
                        src="{{ Storage::url($course->image->url) }}" alt="{{ $course->title }}">
                </div>

                {{-- Info --}}
                <div class="order-2 lg:order-1 text-white space-y-5 pb-10 lg:pb-14">

                    {{-- Badge categoría --}}
                    <span class="inline-flex items-center space-x-1.5 bg-white/10 border border-white/25 text-white rounded-full px-3 py-1 text-xs font-bold uppercase tracking-wider">
                        <svg class="size-3 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z"/></svg>
                        <span>
                            @if($course->category->id == 1) Formación de tercer nivel
                            @elseif($course->category->id == 4) Formación técnica
                            @elseif($course->category->id == 5) Formación Contínua
                            @else {{ $course->category->name }}
                            @endif
                        </span>
                    </span>

                    {{-- Título --}}
                    <h1 class="text-2xl lg:text-3xl font-extrabold leading-tight tracking-tight">
                        {{ $course->title }}
                    </h1>

                    {{-- Chips de info --}}
                    <div class="flex flex-wrap gap-2">
                        @isset($course->approval_date)
                            <span class="inline-flex items-center gap-1.5 bg-white/10 backdrop-blur rounded-full px-3 py-1.5 text-xs">
                                <svg class="size-3.5 fill-naranja shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>
                                Aprobado {{ $course->approval_date->isoFormat('D MMM Y') }}
                            </span>
                        @endisset
                        <span class="inline-flex items-center gap-1.5 bg-white/10 backdrop-blur rounded-full px-3 py-1.5 text-xs">
                            <svg class="size-3.5 fill-white shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                            {{ $course->modality }}
                        </span>
                        <span class="inline-flex items-center gap-1.5 bg-white/10 backdrop-blur rounded-full px-3 py-1.5 text-xs">
                            <svg class="size-3.5 fill-white shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                            {{ $course->duration }}
                        </span>
                    </div>

                    {{-- Costos --}}
                    <div class="flex flex-wrap gap-3">
                        <div class="bg-white/[0.12] backdrop-blur border border-white/20 rounded-xl px-5 py-3">
                            <p class="text-[10px] text-white/60 uppercase tracking-widest mb-0.5">Costo total</p>
                            <p class="text-2xl font-black text-naranja">${{ number_format($course->total_investment, 2) }}</p>
                        </div>
                        @if($course->investment_per_cycle)
                            <div class="bg-white/10 backdrop-blur border border-white/15 rounded-xl px-5 py-3">
                                <p class="text-[10px] text-gray-300 uppercase tracking-widest mb-0.5">Matrícula</p>
                                <p class="text-2xl font-black text-verdeclaro">${{ number_format($course->investment_per_cycle, 2) }}</p>
                            </div>
                        @endif
                    </div>

                    {{-- Botones de documentos --}}
                    @if(count($displayLinks) > 0)
                        <div class="flex flex-wrap gap-2">
                            @foreach($displayLinks as $link)
                                @if(!empty($link['url']))
                                    <a download href="{{ $link['url'] }}" target="_blank"
                                        class="bg-{{ $link['bg'] ?? 'naranja' }} text-{{ $link['text'] ?? 'white' }} rounded-full px-4 py-1.5 inline-flex items-center gap-2 text-sm font-semibold shadow-lg hover:opacity-90 transition">
                                        <svg class="size-4 fill-current shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg>
                                        {{ $link['label'] ?? 'Documento' }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Wave divisor --}}
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 56" class="w-full block -mb-1">
            <path fill="#f3f4f6" d="M0,32 C480,64 960,0 1440,32 L1440,56 L0,56 Z"/>
        </svg>
    </div>

    {{-- ══════════════ CONTENIDO PRINCIPAL ══════════════ --}}
    <div class="bg-gray-100 pb-20">
        <div class="max-w-6xl mx-auto px-3 md:px-4 pt-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- ── Columna principal ── --}}
                <div class="lg:col-span-2 space-y-5">

                    {{-- Objetivo --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-5 py-3.5 border-b border-gray-100 flex items-center gap-2" style="background:linear-gradient(135deg,#32620e0a,#7ea41e08)">
                            <span class="block w-1 h-5 rounded-full bg-verde"></span>
                            <h2 class="text-xs font-bold uppercase tracking-widest text-gray-700">Objetivo del programa</h2>
                        </div>
                        <div class="px-5 py-4 text-sm text-gray-700 leading-relaxed prose prose-sm max-w-none">
                            {!! $course->description !!}
                        </div>
                    </div>

                    {{-- Ventajas --}}
                    @if($course->advantages->isNotEmpty())
                        <div class="rounded-2xl overflow-hidden shadow-sm" style="background:linear-gradient(135deg,#32620e,#5a9018)">
                            <div class="px-5 py-3.5 border-b border-white/20 flex items-center gap-2">
                                <span class="block w-1 h-5 rounded-full bg-naranja"></span>
                                <h2 class="text-xs font-bold uppercase tracking-widest text-white">Ventajas</h2>
                            </div>
                            <div class="px-4 py-4">
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @foreach($course->advantages as $ventaja)
                                            <div class="swiper-slide flex-col bg-white/10 border border-white/20 rounded-xl p-3 shadow-md">
                                                <span class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center mx-auto shrink-0">
                                                    {!! $ventaja->icon !!}
                                                </span>
                                                <p class="mt-2 text-white text-xs text-center font-medium leading-snug">{{ $ventaja->name }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Lo que aprenderás + Para quién --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <div class="px-5 py-3.5 border-b border-gray-100 flex items-center gap-2" style="background:linear-gradient(135deg,#0369a10a,#0369a115)">
                                <span class="block w-1 h-5 rounded-full bg-azul"></span>
                                <h2 class="text-xs font-bold uppercase tracking-widest text-gray-700">Lo que aprenderás</h2>
                            </div>
                            <ul class="px-5 py-4 space-y-2.5">
                                @forelse($course->goals as $goal)
                                    <li class="flex items-start gap-2 text-sm text-gray-700">
                                        <svg class="fill-verdeclaro size-4 mt-0.5 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                        <span>{{ $goal->name }}</span>
                                    </li>
                                @empty
                                    <li class="text-sm text-gray-400 italic">Sin objetivos registrados</li>
                                @endforelse
                            </ul>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <div class="px-5 py-3.5 border-b border-gray-100 flex items-center gap-2" style="background:linear-gradient(135deg,#84219f0a,#84219f15)">
                                <span class="block w-1 h-5 rounded-full bg-morado"></span>
                                <h2 class="text-xs font-bold uppercase tracking-widest text-gray-700">¿Para quién es?</h2>
                            </div>
                            <ul class="px-5 py-4 space-y-2.5">
                                @forelse($course->audiences as $audience)
                                    <li class="flex items-start gap-2 text-sm text-gray-700">
                                        <svg class="fill-morado size-4 mt-0.5 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                        <span>{{ $audience->name }}</span>
                                    </li>
                                @empty
                                    <li class="text-sm text-gray-400 italic">Sin audiencias registradas</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    {{-- Requisitos --}}
                    @if($course->requirements->isNotEmpty())
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <div class="px-5 py-3.5 border-b border-gray-100 flex items-center gap-2" style="background:linear-gradient(135deg,#e59e200a,#e59e2015)">
                                <span class="block w-1 h-5 rounded-full bg-naranja"></span>
                                <h2 class="text-xs font-bold uppercase tracking-widest text-gray-700">Requisitos</h2>
                            </div>
                            <ul class="px-5 py-4 grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                                @foreach($course->requirements as $requirement)
                                    <li class="flex items-start gap-2 text-sm text-gray-700">
                                        <svg class="fill-naranja size-4 mt-0.5 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                        <span>{{ $requirement->name }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Docentes (mobile) --}}
                    @if($course->teachers->isNotEmpty())
                        <div class="lg:hidden bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <div class="px-5 py-3.5 border-b border-gray-100 flex items-center gap-2" style="background:linear-gradient(135deg,#32620e0a,#32620e15)">
                                <span class="block w-1 h-5 rounded-full bg-verde"></span>
                                <h2 class="text-xs font-bold uppercase tracking-widest text-gray-700">Nuestros Docentes</h2>
                            </div>
                            <div class="p-4 space-y-2">
                                @foreach($course->teachers as $key => $teacher)
                                    <div x-data="accordion({{ $key + 1 }})" class="border border-gray-200 rounded-xl overflow-hidden">
                                        <button @click="handleClick()" class="w-full px-4 py-3 flex items-center justify-between bg-white hover:bg-gray-50 transition">
                                            <div class="flex items-center gap-3">
                                                @if($teacher->image)
                                                    <img class="h-9 w-9 rounded-full object-cover border-2 border-verdeclaro/50" src="{{ Storage::url($teacher->image->url) }}" alt="{{ $teacher->name }}">
                                                @else
                                                    <div class="h-9 w-9 rounded-full bg-verde flex items-center justify-center text-white font-bold text-sm">{{ $teacher->initials }}</div>
                                                @endif
                                                <span class="text-sm font-semibold text-gray-800 text-left line-clamp-1">{{ $teacher->name }}</span>
                                            </div>
                                            <svg :class="handleRotate()" class="w-4 h-4 text-gray-400 transition-transform duration-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                        </button>
                                        <div x-ref="tab" :style="handleToggle()" class="max-h-0 overflow-hidden transition-all duration-500 bg-gray-50">
                                            <div class="px-5 py-3">
                                                <div class="flex justify-center gap-5 mb-2">
                                                    @if($teacher->email)
                                                        <a href="mailto:{{ $teacher->email }}" title="Correo" class="text-azul hover:opacity-70"><svg class="size-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg></a>
                                                    @endif
                                                    @if($teacher->phone)
                                                        <a href="https://api.whatsapp.com/send?phone={{ $teacher->phone }}&text={{ urlencode('Hola, ¿en qué puedo ayudarte?') }}" target="_blank" title="WhatsApp" class="text-green-500 hover:opacity-70"><i class="fab fa-whatsapp text-xl"></i></a>
                                                    @endif
                                                </div>
                                                @if($teacher->description)
                                                    <p class="text-xs text-gray-600 text-center">{{ $teacher->description }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>{{-- fin columna principal --}}

                {{-- ── Sidebar ── --}}
                <div class="hidden lg:flex flex-col gap-5">

                    {{-- Tarjeta de matrícula --}}
                    <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden sticky top-24">
                        <div class="h-1.5 w-full" style="background:linear-gradient(90deg,#32620e,#7ea41e,#e59e20)"></div>
                        <div class="p-5">
                            <h2 class="font-bold text-gray-800">Sé parte de este programa</h2>
                            <p class="text-xs text-gray-500 mt-1 mb-4">Da el primer paso hacia tu futuro profesional.</p>

                            @if($course->period && $course->period->isRegistrationOpen())
                                <a class="block text-center w-full bg-morado hover:bg-morado/85 text-white font-bold rounded-xl px-4 py-3 transition botonpro"
                                    href="https://api.whatsapp.com/send?phone={{ $settings->site_phone_1 }}&text={{ $waMensaje }}" target="_blank">
                                    MATRICÚLATE AHORA
                                </a>
                            @else
                                <div class="bg-red-50 border border-red-200 rounded-xl px-4 py-3 text-center">
                                    <p class="text-red-600 text-sm font-semibold">Inscripciones cerradas</p>
                                </div>
                            @endif

                            <div class="mt-4 pt-4 border-t border-gray-100 space-y-2.5">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Modalidad</span>
                                    <span class="font-semibold text-gray-800">{{ $course->modality }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Duración</span>
                                    <span class="font-semibold text-gray-800">{{ $course->duration }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Inversión total</span>
                                    <span class="font-black text-naranja">${{ number_format($course->total_investment, 2) }}</span>
                                </div>
                                @if($course->investment_per_cycle)
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-500">Matrícula</span>
                                        <span class="font-black text-verdeclaro">${{ number_format($course->investment_per_cycle, 2) }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Comunicado --}}
                    @if($course->comunicado)
                        <div class="rounded-2xl overflow-hidden shadow-md" style="background:linear-gradient(135deg,#e59e20,#c8870a)">
                            <div class="px-4 py-3 border-b border-white/20 flex items-center gap-2">
                                <svg class="size-4 fill-white shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M480 32c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9L381.7 53c-48 48-113.1 75-181 75l-8.7 0-32 0-96 0c-35.3 0-64 28.7-64 64l0 96c0 35.3 28.7 64 64 64l0 128c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32l0-128 8.7 0c67.9 0 133 27 181 75l43.6 43.6c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6l0-147.6c18.6-8.8 32-32.5 32-60.4s-13.4-51.6-32-60.4L480 32zm-64 76.7L416 240l0 131.3C357.2 317.8 280.5 288 200.7 288l-8.7 0 0-96 8.7 0c79.8 0 156.5-29.8 215.3-83.3z"/></svg>
                                <span class="text-white font-bold text-sm uppercase tracking-wide">Comunicado</span>
                            </div>
                            <p class="px-4 py-3 text-sm text-white/95 leading-relaxed">{{ $course->comunicado }}</p>
                        </div>
                    @endif

                    {{-- Docentes (desktop) --}}
                    @if($course->teachers->isNotEmpty())
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <div class="px-5 py-3.5 border-b border-gray-100 flex items-center gap-2" style="background:linear-gradient(135deg,#32620e0a,#32620e15)">
                                <span class="block w-1 h-5 rounded-full bg-verde"></span>
                                <h2 class="text-xs font-bold uppercase tracking-widest text-gray-700">Nuestros Docentes</h2>
                            </div>
                            <div class="p-4 space-y-2">
                                @foreach($course->teachers as $key => $teacher)
                                    <div x-data="accordion({{ $key + 100 }})" class="border border-gray-200 rounded-xl overflow-hidden">
                                        <button @click="handleClick()" class="w-full px-4 py-3 flex items-center justify-between bg-white hover:bg-gray-50 transition">
                                            <div class="flex items-center gap-2">
                                                @if($teacher->image)
                                                    <img class="h-8 w-8 rounded-full object-cover border-2 border-verdeclaro/40" src="{{ Storage::url($teacher->image->url) }}" alt="{{ $teacher->name }}">
                                                @else
                                                    <div class="h-8 w-8 rounded-full bg-verde flex items-center justify-center text-white font-bold text-xs">{{ $teacher->initials }}</div>
                                                @endif
                                                <span class="text-sm font-medium text-gray-800 line-clamp-1">{{ $teacher->name }}</span>
                                            </div>
                                            <svg :class="handleRotate()" class="w-4 h-4 text-gray-400 transition-transform duration-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                        </button>
                                        <div x-ref="tab" :style="handleToggle()" class="max-h-0 overflow-hidden transition-all duration-500 bg-gray-50">
                                            <div class="px-4 py-3">
                                                <div class="flex justify-center gap-4 mb-1.5">
                                                    @if($teacher->email)
                                                        <a href="mailto:{{ $teacher->email }}" class="text-azul hover:opacity-70"><svg class="size-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg></a>
                                                    @endif
                                                    @if($teacher->phone)
                                                        <a href="https://api.whatsapp.com/send?phone={{ $teacher->phone }}&text={{ urlencode('Hola, ¿en qué puedo ayudarte?') }}" target="_blank" class="text-green-500 hover:opacity-70"><i class="fab fa-whatsapp text-lg"></i></a>
                                                    @endif
                                                </div>
                                                @if($teacher->description)
                                                    <p class="text-xs text-gray-600 text-center">{{ $teacher->description }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>{{-- fin sidebar --}}

            </div>
        </div>
    </div>

    {{-- ══════════ FLOATING CARD MOBILE ══════════ --}}
    <div class="tarjeta-carrito md:hidden fixed z-40 bottom-0 w-full rounded-t-3xl shadow-2xl overflow-hidden" style="background:linear-gradient(135deg,#0c1a2e,#0369a1)">
        <div class="h-1 w-full" style="background:linear-gradient(90deg,#32620e,#7ea41e,#e59e20)"></div>
        <div class="px-4 pt-3 pb-4">
            <div class="flex items-start justify-between gap-3 mb-3">
                <div class="min-w-0">
                    <p class="text-white font-bold text-sm line-clamp-1">{{ $course->title }}</p>
                    <p class="text-gray-400 text-xs mt-0.5">¿Listo para dar el siguiente paso?</p>
                </div>
                <div class="shrink-0 text-right">
                    <p class="text-[10px] text-gray-500 uppercase tracking-wide">Desde</p>
                    <p class="text-naranja font-black text-lg leading-none">${{ number_format($course->total_investment, 2) }}</p>
                </div>
            </div>
            @if($course->period && $course->period->isRegistrationOpen())
                <a class="block text-center w-full bg-morado hover:bg-morado/85 text-white font-bold rounded-xl px-4 py-2.5 transition botonpro"
                    href="https://api.whatsapp.com/send?phone={{ $settings->site_phone_1 }}&text={{ $waMensaje }}" target="_blank">
                    MATRICÚLATE AHORA
                </a>
            @else
                <p class="text-center text-sm text-white bg-red-700 rounded-xl py-2">Inscripciones cerradas</p>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @push('js')
        <script>
            window.addEventListener('scroll', function () {
                var el = document.querySelector('.tarjeta-carrito');
                if (el) el.classList.toggle('active', window.scrollY > 500);
            });

            document.addEventListener('alpine:init', () => {
                Alpine.store('accordion', { tab: 0 });
                Alpine.data('accordion', (idx) => ({
                    init() { this.idx = idx; },
                    idx: -1,
                    handleClick() { this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx; },
                    handleRotate() { return this.$store.accordion.tab === this.idx ? '-rotate-180' : ''; },
                    handleToggle() { return this.$store.accordion.tab === this.idx ? `max-height:${this.$refs.tab.scrollHeight}px` : ''; }
                }));
            });

            new Swiper('.mySwiper', {
                slidesPerView: 'auto',
                spaceBetween: 10,
                grabCursor: true,
                freeMode: true,
                autoplay: { delay: 2500, disableOnInteraction: false },
                loop: true,
                breakpoints: { 640: { slidesPerView: 2 }, 768: { slidesPerView: 3 }, 1024: { slidesPerView: 4 } },
            });
        </script>
    @endpush
</x-app-layout>
