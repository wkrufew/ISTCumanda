<x-app-layout>
    @section('title', '- Verificación de Calificaciones')
    @section('description', 'Consulta tus calificaciones y acta de notas del Instituto Superior Tecnológico Cumandá. Ingresa tu número de cédula y filtra por período, carrera y semestre para ver tus resultados académicos al instante.')
    @section('keywords', 'calificaciones IST Cumandá, consulta de notas, acta de calificaciones, verificar notas, notas académicas, ISTC Ecuador, portal estudiantil')
    @section('url', route('calificaciones'))
    @section('img', asset('imagenes/logo_pro.webp'))

    @section('og-tags')
        <meta property="og:url"  content="{{ route('calificaciones') }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Verificación de Calificaciones — IST Cumandá">
    @endsection

    {{-- ══════════ HERO ══════════ --}}
    <section class="-mt-20 mb-10">
        <div class="relative overflow-hidden w-full h-52 md:h-60 flex items-end"
             style="background: linear-gradient(135deg, #0e1f05 0%, #1a3a07 40%, #1f0a2e 100%)">
            {{-- Orbes --}}
            <div class="absolute top-0 right-0 w-80 h-80 rounded-full opacity-10 pointer-events-none"
                 style="background: radial-gradient(circle, #0369a1, transparent); transform: translate(30%,-30%)"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 rounded-full opacity-10 pointer-events-none"
                 style="background: radial-gradient(circle, #84219f, transparent); transform: translate(-30%,30%)"></div>

            {{-- Patrón decorativo --}}
            <div class="absolute inset-0 opacity-[0.03]"
                 style="background-image: repeating-linear-gradient(45deg, #fff 0, #fff 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>

            <div class="relative max-w-5xl mx-auto px-4 pb-8 pt-20 w-full">
                <span class="inline-block bg-azul/20 border border-azul/40 text-azul text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-2">
                    Portal académico
                </span>
                <h1 class="text-white text-2xl md:text-4xl font-extrabold tracking-tight leading-tight">
                    Verificación de Calificaciones
                </h1>
                <p class="text-white/50 text-sm mt-1 hidden md:block">
                    Consulta tu acta de notas por período, carrera y semestre de forma segura
                </p>
            </div>

            <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 28">
                <path fill="#f9fafb" d="M0,16 C480,32 960,0 1440,16 L1440,28 L0,28 Z"/>
            </svg>
        </div>
    </section>

    {{-- ══════════ COMPONENTE ══════════ --}}
    <div class="max-w-5xl mx-auto px-4 pb-24">
        <livewire:search-calificacion />
    </div>

</x-app-layout>
