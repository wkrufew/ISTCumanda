<x-app-layout>
    @section('title', '- Bibliotecas Virtuales')
    @section('description', 'Accede a las bibliotecas virtuales del Instituto Superior Tecnológico Cumandá: SciELO, Internet Archive y más recursos digitales de libre acceso para estudiantes e investigadores. Conocimiento disponible desde cualquier lugar y en cualquier momento.')
    @section('keywords', 'bibliotecas virtuales IST Cumandá, SciELO Ecuador, Internet Archive, recursos digitales educativos, libros electrónicos gratuitos, revistas científicas, acceso abierto al conocimiento')
    @section('url', route('virtual'))
    @section('img', 'https://images.pexels.com/photos/9572477/pexels-photo-9572477.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')

    @section('og-tags')
        <meta property="og:url" content="{{ route('virtual') }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Bibliotecas Virtuales — IST Cumandá">
    @endsection

    {{-- ══════════ HERO ══════════ --}}
    <section class="-mt-20 mb-10">
        <div class="relative overflow-hidden w-full h-52 md:h-60 flex items-end"
             style="background: linear-gradient(135deg, #0e1f05 0%, #1a3a07 40%, #1f0a2e 100%)">
            <div class="absolute top-0 right-0 w-80 h-80 rounded-full opacity-10 pointer-events-none"
                 style="background: radial-gradient(circle, #7ea41e, transparent); transform: translate(30%,-30%)"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 rounded-full opacity-10 pointer-events-none"
                 style="background: radial-gradient(circle, #84219f, transparent); transform: translate(-30%,30%)"></div>
            <div class="absolute inset-0 opacity-[0.03]"
                 style="background-image: repeating-linear-gradient(45deg, #fff 0, #fff 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>

            <div class="relative max-w-5xl mx-auto px-4 pb-8 pt-20 w-full">
                <span class="inline-block bg-verdeclaro/20 border border-verdeclaro/40 text-verdeclaro text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-2">
                    Recursos digitales
                </span>
                <h1 class="text-white text-2xl md:text-4xl font-extrabold tracking-tight leading-tight">
                    Bibliotecas Virtuales
                </h1>
                <p class="text-white/50 text-sm mt-1 hidden md:block">
                    Accede al conocimiento sin límites, donde y cuando lo necesites
                </p>
            </div>

            <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 28">
                <path fill="#f9fafb" d="M0,16 C480,32 960,0 1440,16 L1440,28 L0,28 Z"/>
            </svg>
        </div>
    </section>

    <div class="max-w-5xl mx-auto px-4 pb-24">

        {{-- ══════════ INTRO ══════════ --}}
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8 md:p-12 mb-10">
            <div class="max-w-2xl mx-auto text-center">
                <div class="size-16 rounded-3xl mx-auto mb-5 flex items-center justify-center"
                     style="background: linear-gradient(135deg, #32620e, #7ea41e)">
                    <svg class="size-8 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                </div>
                <h2 class="text-2xl md:text-3xl font-extrabold text-gray-800 mb-3">
                    Acceso abierto al conocimiento
                </h2>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Las bibliotecas virtuales son espacios en línea que ofrecen acceso a una amplia variedad de recursos: artículos científicos, libros electrónicos, tesis, documentos históricos y más. Disponibles desde cualquier lugar y en cualquier momento para facilitar tu investigación y aprendizaje.
                </p>
                <div class="mt-7 flex flex-wrap justify-center gap-3">
                    <span class="inline-flex items-center gap-2 text-xs font-semibold text-gray-500 bg-gray-50 border border-gray-100 px-3.5 py-2 rounded-full">
                        <svg class="size-3.5 fill-verde" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                        Acceso gratuito
                    </span>
                    <span class="inline-flex items-center gap-2 text-xs font-semibold text-gray-500 bg-gray-50 border border-gray-100 px-3.5 py-2 rounded-full">
                        <svg class="size-3.5 fill-verde" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                        Disponible 24/7
                    </span>
                    <span class="inline-flex items-center gap-2 text-xs font-semibold text-gray-500 bg-gray-50 border border-gray-100 px-3.5 py-2 rounded-full">
                        <svg class="size-3.5 fill-verde" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                        Recursos especializados
                    </span>
                </div>
            </div>
        </div>

        {{-- ══════════ TÍTULO SECCIÓN ══════════ --}}
        <div class="mb-6">
            <h2 class="text-xl md:text-2xl font-extrabold text-gray-800">Recursos disponibles</h2>
            <p class="text-gray-400 text-sm mt-0.5">Plataformas de acceso abierto enlazadas al IST Cumandá</p>
        </div>

        {{-- ══════════ BIBLIOTECAS ══════════ --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- SciELO --}}
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden group hover:shadow-md hover:border-azul/20 transition-all duration-300 flex flex-col">
                {{-- Header decorativo --}}
                <div class="relative h-44 flex items-center justify-center overflow-hidden"
                     style="background: linear-gradient(135deg, #0c4a7a 0%, #0369a1 50%, #0284c7 100%)">
                    <div class="absolute inset-0 opacity-[0.06]"
                         style="background-image: repeating-linear-gradient(45deg, #fff 0, #fff 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>
                    <div class="absolute top-0 right-0 w-40 h-40 rounded-full opacity-10"
                         style="background: radial-gradient(circle, #fff, transparent); transform: translate(20%,-20%)"></div>
                    {{-- Ícono científico --}}
                    <svg class="size-24 opacity-10 fill-white absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64L0 400c0 44.2 35.8 80 80 80l400 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 416c-8.8 0-16-7.2-16-16L64 64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/></svg>
                    <div class="relative text-center px-6">
                        <div class="size-14 rounded-2xl mx-auto mb-3 flex items-center justify-center"
                             style="background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.25)">
                            <svg class="size-7 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.4l0 28.1c-28.4 5.4-50 30.3-50 60.5c0 29.7 20.9 54.1 48.5 60.1L32.4 504C31.5 511 36.8 512 40 512l60 0c3.3 0 8.5-1 7.6-8L93.5 440.1C121.1 434.1 142 409.7 142 380c0-30.2-21.6-55.1-50-60.5l0-28.1c0-25.8 6.6-50.1 18.1-71.3L320 288c9.3 3.3 19.1 5 29.2 5s19.8-1.7 29.2-5l257.1-92.4c9.5-3.4 15.7-12.5 15.5-22.6s-6.7-19-16.3-22.4L343.7 36.1C336.1 33.4 328.1 32 320 32z"/></svg>
                        </div>
                        <span class="inline-block bg-white/20 border border-white/30 text-white text-[9px] font-black uppercase tracking-widest px-2.5 py-1 rounded-full">
                            Ciencia &amp; Investigación
                        </span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <h4 class="text-lg font-extrabold text-gray-800">SciELO</h4>
                        <span class="shrink-0 inline-flex items-center gap-1 text-[10px] text-gray-400 font-semibold mt-1">
                            <svg class="size-3 fill-azul" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.5 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.5-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z"/></svg>
                            scielo.org
                        </span>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed flex-1">
                        Biblioteca científica de Latinoamérica con artículos en PDF para investigaciones. Reúne revistas académicas revisadas por pares en ciencias, tecnología, humanidades y más, en acceso abierto.
                    </p>
                    <div class="mt-5">
                        <a href="https://www.scielo.org/es/" target="_blank" rel="noopener"
                           class="flex items-center justify-center gap-2 w-full py-3 rounded-2xl text-sm font-bold text-white transition hover:opacity-90 active:scale-95"
                           style="background: linear-gradient(135deg, #0c4a7a, #0369a1)">
                            <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg>
                            Visitar SciELO
                        </a>
                    </div>
                </div>
            </div>

            {{-- Internet Archive --}}
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden group hover:shadow-md hover:border-morado/20 transition-all duration-300 flex flex-col">
                {{-- Header decorativo --}}
                <div class="relative h-44 flex items-center justify-center overflow-hidden"
                     style="background: linear-gradient(135deg, #3b0764 0%, #84219f 50%, #a21caf 100%)">
                    <div class="absolute inset-0 opacity-[0.06]"
                         style="background-image: repeating-linear-gradient(45deg, #fff 0, #fff 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>
                    <div class="absolute bottom-0 left-0 w-40 h-40 rounded-full opacity-10"
                         style="background: radial-gradient(circle, #fff, transparent); transform: translate(-20%,20%)"></div>
                    {{-- Ícono archivo --}}
                    <svg class="size-24 opacity-10 fill-white absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M32 32l448 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96L0 64C0 46.3 14.3 32 32 32zm0 128l448 0 0 256c0 35.3-28.7 64-64 64L96 480c-35.3 0-64-28.7-64-64l0-256zm128 80c0 8.8 7.2 16 16 16l160 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-160 0c-8.8 0-16 7.2-16 16z"/></svg>
                    <div class="relative text-center px-6">
                        <div class="size-14 rounded-2xl mx-auto mb-3 flex items-center justify-center"
                             style="background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.25)">
                            <svg class="size-7 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M32 32l448 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96L0 64C0 46.3 14.3 32 32 32zm0 128l448 0 0 256c0 35.3-28.7 64-64 64L96 480c-35.3 0-64-28.7-64-64l0-256zm128 80c0 8.8 7.2 16 16 16l160 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-160 0c-8.8 0-16 7.2-16 16z"/></svg>
                        </div>
                        <span class="inline-block bg-white/20 border border-white/30 text-white text-[9px] font-black uppercase tracking-widest px-2.5 py-1 rounded-full">
                            Libros &amp; Documentos
                        </span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <h4 class="text-lg font-extrabold text-gray-800">Internet Archive</h4>
                        <span class="shrink-0 inline-flex items-center gap-1 text-[10px] text-gray-400 font-semibold mt-1">
                            <svg class="size-3 fill-morado" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.5 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.5-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z"/></svg>
                            archive.org
                        </span>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed flex-1">
                        Millones de libros, tesis y documentos con descarga o préstamo digital gratuito. Incluye libros técnicos, publicaciones históricas y una vasta colección de recursos académicos en múltiples idiomas.
                    </p>
                    <div class="mt-5">
                        <a href="https://archive.org/" target="_blank" rel="noopener"
                           class="flex items-center justify-center gap-2 w-full py-3 rounded-2xl text-sm font-bold text-white transition hover:opacity-90 active:scale-95"
                           style="background: linear-gradient(135deg, #3b0764, #84219f)">
                            <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg>
                            Visitar Internet Archive
                        </a>
                    </div>
                </div>
            </div>

        </div>

        {{-- ══════════ CTA ══════════ --}}
        <div class="mt-10 rounded-3xl overflow-hidden"
             style="background: linear-gradient(135deg, #0e1f05 0%, #1a3a07 60%, #1f0a2e 100%)">
            <div class="px-8 md:px-12 py-10 flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <p class="text-white/50 text-xs uppercase tracking-widest font-bold mb-1">¿Necesitas más recursos?</p>
                    <h3 class="text-white text-xl md:text-2xl font-extrabold leading-tight">Contáctanos para más información</h3>
                    <p class="text-white/60 text-sm mt-2">Nuestro equipo puede orientarte sobre recursos adicionales disponibles para estudiantes.</p>
                </div>
                <a href="{{ route('contact') }}"
                   class="shrink-0 inline-flex items-center gap-2 px-7 py-3.5 rounded-2xl text-sm font-bold text-white transition hover:opacity-90 active:scale-95"
                   style="background: linear-gradient(135deg, #7ea41e, #32620e)">
                    <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                    Contáctanos
                </a>
            </div>
        </div>

    </div>

</x-app-layout>
