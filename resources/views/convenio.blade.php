<x-app-layout>
    @section('title', '- Convenios Interinstitucionales')
    @section('description', 'Explora los convenios interinstitucionales del Instituto Superior Tecnológico Cumandá con diversas organizaciones para fortalecer la educación y abrir oportunidades.')
    @section('keywords', 'convenios, IST Cumandá, alianzas, interinstitucional, educación, cooperación')
    @section('url', route('convenios'))
    @section('img', 'https://images.pexels.com/photos/5583250/pexels-photo-5583250.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')

    @section('og-tags')
        <meta property="og:url" content="{{ route('convenios') }}">
        <meta property="og:type" content="website">
    @endsection

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    @endpush

    {{-- ══════════ HERO ══════════ --}}
    <section class="-mt-20 mb-12">
        <div class="relative overflow-hidden w-full h-52 md:h-64 flex items-end"
             style="background: linear-gradient(135deg, #0e1f05 0%, #1a3a07 40%, #1f0a2e 100%)">
            <div class="absolute top-0 right-0 w-80 h-80 rounded-full opacity-10 pointer-events-none"
                 style="background: radial-gradient(circle, #7ea41e, transparent); transform: translate(30%,-30%)"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 rounded-full opacity-10 pointer-events-none"
                 style="background: radial-gradient(circle, #e59e20, transparent); transform: translate(-30%,30%)"></div>

            <div class="relative max-w-5xl mx-auto px-4 pb-8 pt-20 w-full">
                <span class="inline-block bg-naranja/20 border border-naranja/40 text-naranja text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-2">
                    Alianzas Estratégicas
                </span>
                <h1 class="text-white text-2xl md:text-4xl font-extrabold tracking-tight leading-tight">
                    Convenios Interinstitucionales
                </h1>
                <p class="text-white/50 text-sm mt-1 hidden md:block">
                    Unimos fuerzas con organizaciones líderes para abrir más puertas hacia el éxito
                </p>
            </div>

            <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 28">
                <path fill="#f9fafb" d="M0,16 C480,32 960,0 1440,16 L1440,28 L0,28 Z"/>
            </svg>
        </div>
    </section>

    {{-- ══════════ INTRO ══════════ --}}
    <section class="max-w-4xl mx-auto px-4 mb-16 text-center">
        <p class="text-gray-600 text-base leading-relaxed">
            Nuestras alianzas estratégicas fortalecen el camino hacia una educación integral, conectando oportunidades globales con el talento local. Cada convenio representa un compromiso real con la calidad y el futuro de nuestros estudiantes.
        </p>
        <div class="flex items-center justify-center gap-8 mt-8 flex-wrap">
            <div class="flex flex-col items-center">
                <span class="text-3xl font-extrabold text-verde">6+</span>
                <span class="text-xs text-gray-500 uppercase tracking-widest font-semibold">Convenios activos</span>
            </div>
            <div class="w-px h-10 bg-gray-200 hidden sm:block"></div>
            <div class="flex flex-col items-center">
                <span class="text-3xl font-extrabold text-naranja">Nacional</span>
                <span class="text-xs text-gray-500 uppercase tracking-widest font-semibold">Cobertura</span>
            </div>
            <div class="w-px h-10 bg-gray-200 hidden sm:block"></div>
            <div class="flex flex-col items-center">
                <span class="text-3xl font-extrabold" style="color:#84219f">Múltiple</span>
                <span class="text-xs text-gray-500 uppercase tracking-widest font-semibold">Sectores</span>
            </div>
        </div>
    </section>

    {{-- ══════════ LISTA DE CONVENIOS ══════════ --}}
    <section class="max-w-5xl mx-auto px-4 pb-24 space-y-8">

        {{-- ── CONVENIO 1: Cámara de Comercio del Guayas ── --}}
        <article class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-0">
                {{-- Texto --}}
                <div class="md:col-span-3 p-7 md:p-10 flex flex-col justify-between order-2 md:order-1">
                    <div>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-[10px] font-black uppercase tracking-widest text-white px-3 py-1.5 rounded-full"
                                  style="background:linear-gradient(135deg,#32620e,#7ea41e)">Convenio 01</span>
                            <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-widest">Turismo</span>
                        </div>
                        <h2 class="text-xl md:text-2xl font-extrabold text-gray-800 leading-tight mb-3">
                            Cámara de Turismo del Guayas
                        </h2>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            La Cámara de Turismo del Guayas y el Instituto Superior Tecnológico Cumandá celebran una alianza estratégica mediante un convenio interinstitucional, que busca fortalecer la formación académica, la innovación y las oportunidades de desarrollo para los futuros profesionales del sector turístico.
                            <br><br>
                            Este acuerdo impulsa el trabajo conjunto en proyectos educativos, prácticas preprofesionales, capacitaciones y actividades que contribuyan al crecimiento del turismo sostenible en la región.
                        </p>
                    </div>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <button href="{{ asset('documentos/convenios/convenio_ctg.pdf') }}"
                           data-fancybox data-type="pdf" data-caption="Convenio — Cámara de Turismo del Guayas"
                           class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-white transition hover:opacity-90 cursor-pointer"
                           style="background:linear-gradient(135deg,#32620e,#7ea41e)">
                            <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                            Ver Convenio
                        </button>
                    </div>
                </div>
                {{-- Imagen --}}
                <div class="md:col-span-2 order-1 md:order-2">
                    <a href="{{ asset('imagenes/convenio/CAMARA_COMERCIO_GUAYAS.jpeg') }}"
                       data-fancybox="gallery-ctg" data-caption="Convenio — Cámara de Comercio del Guayas">
                        <img src="{{ asset('imagenes/convenio/CAMARA_COMERCIO_GUAYAS.jpeg') }}"
                             alt="Cámara de Comercio del Guayas"
                             class="w-full h-64 md:h-full object-cover hover:opacity-95 transition cursor-zoom-in"
                             loading="lazy" width="480" height="360">
                    </a>
                </div>
            </div>
        </article>

        {{-- ── CONVENIO 2: Ibarra / Luis Salas ── --}}
        <article class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-7 md:p-10">
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-[10px] font-black uppercase tracking-widest text-white px-3 py-1.5 rounded-full"
                          style="background:linear-gradient(135deg,#0369a1,#0284c7)">Convenio 02</span>
                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-widest">Educación</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-xl md:text-2xl font-extrabold text-gray-800 leading-tight mb-3">
                            Cooperación en Ibarra
                        </h2>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            El Instituto Superior Tecnológico Cumandá firma convenio de cooperación educativa con un centro de capacitación en la ciudad de Ibarra. Con ello, la ciudadanía en general de Ibarra podrá acceder a información de los programas académicos que oferta el Instituto. Caminamos juntos por una educación superior de calidad.
                        </p>
                    </div>
                    <div class="flex items-center justify-center bg-gray-50 rounded-2xl p-8">
                        <div class="text-center">
                            <svg class="size-16 mx-auto mb-3 fill-azul/20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M0 48C0 21.5 21.5 0 48 0l0 48 0 393.4 130.3-92.9c8.8-6.3 19.4-9.5 30.2-9.5l398.4 0c26.5 0 48 21.5 48 48l0 0c0 26.5-21.5 48-48 48l-397.3 0L48 536.3 48 48 0 48z"/></svg>
                            <p class="text-xs text-gray-400 font-semibold">Convenio de cooperación académica</p>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex flex-wrap gap-3">
                    <button href="{{ asset('documentos/convenios/convenio_luis_salas.pdf') }}"
                       data-fancybox data-type="pdf" data-caption="Convenio — Cooperación en Ibarra"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-white transition hover:opacity-90 cursor-pointer"
                       style="background:linear-gradient(135deg,#0369a1,#0284c7)">
                        <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                        Ver Convenio
                    </button>
                </div>
            </div>
        </article>

        {{-- ── CONVENIO 3: CTE (FEATURED — tiene 2 imágenes + 2 PDFs) ── --}}
        <article class="bg-white rounded-3xl border border-verde/20 shadow-md overflow-hidden ring-1 ring-verde/10">
            {{-- Badge featured --}}
            <div class="px-7 md:px-10 pt-6 pb-0">
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-[10px] font-black uppercase tracking-widest text-white px-3 py-1.5 rounded-full"
                          style="background:linear-gradient(135deg,#32620e,#7ea41e)">Convenio 03</span>
                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-widest">Tránsito · Seguridad Vial</span>
                    <span class="ml-auto inline-flex items-center gap-1 text-[10px] font-black text-naranja uppercase tracking-widest">
                        <svg class="size-3 fill-naranja" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.4 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        Destacado
                    </span>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-0">
                {{-- Texto --}}
                <div class="md:col-span-3 px-7 md:px-10 pb-7 md:pb-10 flex flex-col justify-between order-2 md:order-1">
                    <div>
                        <h2 class="text-xl md:text-2xl font-extrabold text-gray-800 leading-tight mb-3">
                            Comisión de Tránsito del Ecuador
                        </h2>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            La Comisión de Tránsito del Ecuador y el IST Cumandá suscriben un convenio de cooperación interinstitucional orientado al desarrollo, aval y ejecución de programas de capacitación y formación académica continua dirigidos al personal de la CTE.
                            <br><br>
                            Ambas instituciones se comprometen a articular esfuerzos para fortalecer las competencias técnicas y profesionales de los servidores, garantizando la calidad y certificación de los procesos formativos.
                        </p>
                    </div>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <button href="{{ asset('documentos/convenios/convenio_cte.pdf') }}"
                           data-fancybox data-type="pdf" data-caption="Convenio CTE — Documento 1"
                           class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-white transition hover:opacity-90 cursor-pointer"
                           style="background:linear-gradient(135deg,#32620e,#7ea41e)">
                            <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                            Ver Convenio 1
                        </button>
                        <button href="{{ asset('documentos/convenios/convenio_cte2.pdf') }}"
                           data-fancybox data-type="pdf" data-caption="Convenio CTE — Documento 2"
                           class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold border-2 border-verde text-verde hover:bg-verde hover:text-white transition-all duration-200 cursor-pointer">
                            <svg class="size-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                            Ver Convenio 2
                        </button>
                    </div>
                </div>
                {{-- Galería de 2 imágenes sobremontadas --}}
                <div class="md:col-span-2 order-1 md:order-2 relative h-72 md:h-auto">
                    <a href="{{ asset('imagenes/convenio/convenio_cte_1.webp') }}"
                       data-fancybox="gallery-cte" data-caption="Comisión de Tránsito del Ecuador">
                        <img src="{{ asset('imagenes/convenio/convenio_cte_1.webp') }}"
                             alt="CTE convenio foto 1"
                             class="z-20 absolute left-1/2 transform -translate-x-1/2 top-4 h-64 md:h-72 object-cover object-left-top rounded-xl border-2 border-verde cursor-zoom-in hover:opacity-95 transition"
                             loading="lazy" width="320" height="288">
                    </a>
                    <a class="hidden md:block" href="{{ asset('imagenes/convenio/convenio_cte_2.webp') }}"
                       data-fancybox="gallery-cte" data-caption="Personal de la CTE">
                        <img src="{{ asset('imagenes/convenio/convenio_cte_2.webp') }}"
                             alt="CTE convenio foto 2"
                             class="z-30 absolute right-4 top-1/3 transform translate-y-7 w-44 h-56 object-cover object-left-top rounded-xl border-2 border-verde shadow-xl cursor-zoom-in hover:opacity-95 transition"
                             loading="lazy" width="176" height="224">
                    </a>
                </div>
            </div>
        </article>

        {{-- ── CONVENIO 4: West Pacific Fly ── --}}
        <article class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-7 md:p-10">
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-[10px] font-black uppercase tracking-widest text-white px-3 py-1.5 rounded-full"
                          style="background:linear-gradient(135deg,#84219f,#a020f0)">Convenio 04</span>
                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-widest">Aviación · Aeronáutica</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-xl md:text-2xl font-extrabold text-gray-800 leading-tight mb-3">
                            Academia de Aviación West Pacific Fly
                        </h2>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            El IST Cumandá y la Academia de Aviación West Pacific Fly Cía. Ltda. suscriben un convenio académico que establece una alianza orientada a la formación profesional en el ámbito aeronáutico, permitiendo que los estudiantes de la academia accedan a un título de tercer nivel en Planificación y Gestión de la Aviación, bajo modalidad híbrida.
                            <br><br>
                            Ambas instituciones articulan esfuerzos en docencia, investigación, infraestructura y validación de conocimientos, garantizando calidad y pertinencia formativa.
                        </p>
                    </div>
                    <div class="flex items-center justify-center bg-gradient-to-br rounded-2xl p-8"
                         style="background: linear-gradient(135deg, #84219f08, #a020f008)">
                        <div class="text-center">
                            <svg class="size-16 mx-auto mb-3" style="fill:#84219f30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M482.3 192c34.2 0 93.7 29 93.7 64c0 36-59.5 64-93.7 64l-116.6 0L265.2 495.9c-5.7 10-16.3 16.1-27.8 16.1l-56.2 0c-10.6 0-18.3-10.1-15.1-20.2l77.3-235.8H112l-43.3 51.4C65.6 312.4 61.2 320 53.3 320l-44.7 0c-9.8 0-17.6-8.8-15.6-18.4l57.1-285.5C52.3 7.9 59.5 0 68.8 0l44.7 0c8.5 0 13.1 8.2 13.1 16.8l0 55.2 141.3 0c6.5-3.3 13.4-5 20.3-5L482.3 192z"/></svg>
                            <p class="text-xs font-bold uppercase tracking-widest" style="color:#84219f80">Sector Aeronáutico</p>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex flex-wrap gap-3">
                    <button href="{{ asset('documentos/convenios/convenio_aawpf.pdf') }}"
                       data-fancybox data-type="pdf" data-caption="Convenio — West Pacific Fly"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-white transition hover:opacity-90 cursor-pointer"
                       style="background:linear-gradient(135deg,#84219f,#a020f0)">
                        <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                        Ver Convenio
                    </button>
                </div>
            </div>
        </article>

        {{-- ── CONVENIO 5: Centro de Capacitación Renacer ── --}}
        <article class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-7 md:p-10">
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-[10px] font-black uppercase tracking-widest text-white px-3 py-1.5 rounded-full"
                          style="background:linear-gradient(135deg,#e59e20,#f59e0b)">Convenio 05</span>
                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-widest">Capacitación · Social</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-xl md:text-2xl font-extrabold text-gray-800 leading-tight mb-3">
                            Centro de Capacitación Renacer
                        </h2>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            El IST Cumandá y el Centro de Capacitación Renacer suscriben un convenio de cooperación interinstitucional que establece una alianza orientada al desarrollo y fortalecimiento de actividades académicas, formativas, investigativas y de vinculación con la sociedad, promoviendo el trabajo conjunto en beneficio de la comunidad.
                            <br><br>
                            Ambas instituciones articulan esfuerzos para la ejecución de programas de capacitación y la difusión de la oferta académica del Instituto.
                        </p>
                    </div>
                    <div class="flex items-center justify-center rounded-2xl p-8"
                         style="background: linear-gradient(135deg, #e59e2008, #f59e0b08)">
                        <div class="text-center">
                            <svg class="size-16 mx-auto mb-3 fill-naranja/20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM609.3 512l-137.8 0c5.4-9.4 8.6-20.3 8.6-32l0-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2l61.4 0C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/></svg>
                            <p class="text-xs font-bold uppercase tracking-widest text-naranja/50">Vinculación Social</p>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <button href="{{ asset('documentos/convenios/convenio_ccr_1.pdf') }}"
                       data-fancybox data-type="pdf" data-caption="Convenio — Centro de Capacitación Renacer"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-white transition hover:opacity-90 cursor-pointer"
                       style="background:linear-gradient(135deg,#e59e20,#f59e0b)">
                        <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                        Ver Convenio
                    </button>
                </div>
            </div>
        </article>

        {{-- ── CONVENIO 6: FCIDI / Semilla Pastoral ── --}}
        <article class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-7 md:p-10">
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-[10px] font-black uppercase tracking-widest text-white px-3 py-1.5 rounded-full"
                          style="background:linear-gradient(135deg,#32620e,#7ea41e)">Convenio 06</span>
                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-widest">Pastoral · Teología</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-xl md:text-2xl font-extrabold text-gray-800 leading-tight mb-3">
                            Fundación Cristiana de Investigación y Desarrollo Integral
                        </h2>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            El IST Cumandá y la Fundación FCIDI suscriben un convenio específico de cooperación académica que establece una alianza orientada a la articulación de la formación teológica y pastoral con programas de educación superior tecnológica, permitiendo a los estudiantes acceder a un título de tercer nivel en Acción Pastoral con reconocimiento oficial.
                            <br><br>
                            Ambas instituciones coordinan procesos de fortalecimiento académico e integración formativa conforme a la normativa vigente.
                        </p>
                    </div>
                    <div class="flex items-center justify-center rounded-2xl p-8"
                         style="background: linear-gradient(135deg, #32620e06, #7ea41e08)">
                        <div class="text-center">
                            <svg class="size-16 mx-auto mb-3 fill-verde/20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-114.7 0-208-93.31-208-208S141.3 48 256 48s208 93.31 208 208S370.7 464 256 464zM280 256V152C280 138.8 269.3 128 256 128S232 138.8 232 152V256c0 6.641 2.656 12.54 6.877 16.97L303 337.1c4.719 4.719 10.91 7.031 17.09 7.031S332.3 342.8 337 338.1c9.375-9.375 9.375-24.56 0-33.94L280 256z"/></svg>
                            <p class="text-xs font-bold uppercase tracking-widest text-verde/40">Cooperación Académica</p>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <button href="{{ asset('documentos/convenios/convenio_fcidi_1.pdf') }}"
                       data-fancybox data-type="pdf" data-caption="Convenio — Fundación FCIDI"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-white transition hover:opacity-90 cursor-pointer"
                       style="background:linear-gradient(135deg,#32620e,#7ea41e)">
                        <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                        Ver Convenio
                    </button>
                </div>
            </div>
        </article>

        {{-- ── CONVENIO 7: Biohack UIO ── --}}
        <article class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-0">
                {{-- Texto --}}
                <div class="md:col-span-3 p-7 md:p-10 flex flex-col justify-between order-2 md:order-1">
                    <div>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-[10px] font-black uppercase tracking-widest text-white px-3 py-1.5 rounded-full"
                                  style="background:linear-gradient(135deg,#0369a1,#06b6d4)">Convenio 07</span>
                            <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-widest">Biotecnología · Innovación</span>
                        </div>
                        <h2 class="text-xl md:text-2xl font-extrabold text-gray-800 leading-tight mb-3">
                            Biohack UIO
                        </h2>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Gracias al convenio con Biohack UIO, los estudiantes del IST Cumandá podrán acceder a prácticas profesionales teniendo un aprendizaje real y de primera. Biohack UIO es un laboratorio de biotecnología que busca fomentar la innovación y el emprendimiento en el Ecuador.
                        </p>
                    </div>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="https://biohackuio.com" target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-white transition hover:opacity-90"
                           style="background:linear-gradient(135deg,#0369a1,#06b6d4)">
                            <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg>
                            Visitar Biohack UIO
                        </a>
                    </div>
                </div>
                {{-- Imagen --}}
                <div class="md:col-span-2 order-1 md:order-2">
                    <a href="{{ asset('imagenes/convenio/PCR.webp') }}"
                       data-fancybox="gallery-biohack" data-caption="Biohack UIO — Laboratorio de Biotecnología">
                        <img src="{{ asset('imagenes/convenio/PCR.webp') }}"
                             alt="Biohack UIO"
                             class="w-full h-64 md:h-full object-cover hover:opacity-95 transition cursor-zoom-in"
                             loading="lazy" width="480" height="360">
                    </a>
                </div>
            </div>
        </article>

    </section>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
        <script>
            Fancybox.bind("[data-fancybox]", {
                Toolbar: {
                    display: {
                        left:   ["infobar"],
                        middle: [],
                        right:  ["iterateZoom", "slideshow", "fullscreen", "thumbs", "close"],
                    },
                },
                Images: { zoom: true },
                Carousel: { transition: "fade" },
            });
        </script>
    @endpush
</x-app-layout>
