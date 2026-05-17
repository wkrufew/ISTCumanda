<x-app-layout>
    @section('title', '- Verificación de Certificados')
    @section('description', 'Verifica y descarga de forma gratuita tus certificados de formación emitidos por el Instituto Superior Tecnológico Cumandá. Ingresa tu número de cédula y consulta al instante.')
    @section('keywords', 'certificados IST Cumandá, verificar certificado, constancia de capacitación, certificación tecnológica, SNNA, SENESCYT')
    @section('url', route('certificados'))
    @section('img', 'https://images.pexels.com/photos/4144923/pexels-photo-4144923.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')

    @section('og-tags')
        <meta property="og:url"  content="{{ route('certificados') }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Verificación de Certificados — IST Cumandá">
    @endsection

    {{-- ══════════ HERO ══════════ --}}
    <section class="-mt-20 mb-10">
        <div class="relative overflow-hidden w-full h-52 md:h-60 flex items-end"
             style="background: linear-gradient(135deg, #0e1f05 0%, #1a3a07 40%, #1f0a2e 100%)">
            {{-- Orbes --}}
            <div class="absolute top-0 right-0 w-80 h-80 rounded-full opacity-10 pointer-events-none"
                 style="background: radial-gradient(circle, #e59e20, transparent); transform: translate(30%,-30%)"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 rounded-full opacity-10 pointer-events-none"
                 style="background: radial-gradient(circle, #84219f, transparent); transform: translate(-30%,30%)"></div>

            {{-- Patrón decorativo --}}
            <div class="absolute inset-0 opacity-[0.03]"
                 style="background-image: repeating-linear-gradient(45deg, #fff 0, #fff 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>

            <div class="relative max-w-5xl mx-auto px-4 pb-8 pt-20 w-full">
                <span class="inline-block bg-naranja/20 border border-naranja/40 text-naranja text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-2">
                    Portal de certificados
                </span>
                <h1 class="text-white text-2xl md:text-4xl font-extrabold tracking-tight leading-tight">
                    Verificación de Certificados
                </h1>
                <p class="text-white/50 text-sm mt-1 hidden md:block">
                    Consulta y descarga al instante tus certificados de formación continua
                </p>
            </div>

            <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 28">
                <path fill="#f9fafb" d="M0,16 C480,32 960,0 1440,16 L1440,28 L0,28 Z"/>
            </svg>
        </div>
    </section>

    {{-- ══════════ COMPONENTE ══════════ --}}
    <div class="max-w-5xl mx-auto px-4 pb-24">
        <livewire:search-certificate/>
    </div>

</x-app-layout>
