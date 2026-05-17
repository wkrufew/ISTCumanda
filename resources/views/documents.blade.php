<x-app-layout>
    @section('title', '- Documentación Legal')
    @section('description', 'Consulta y descarga los documentos legales oficiales del Instituto Superior Tecnológico Cumandá: resoluciones, reglamentos, acuerdos y más.')
    @section('keywords', 'documentos legales, IST Cumandá, resoluciones, reglamentos, acuerdos ministeriales')
    @section('url', route('documents'))
    @section('img', 'https://media.istockphoto.com/id/1902034840/photo/electronic-document-management-system-concept-searching-and-business-managing-files-online.jpg?s=2048x2048&w=is&k=20&c=oUFUZ7B3ecPate-IU-A_oDFxwg4oGqmVzshBylMCY0I=')

    @section('og-tags')
        <meta property="og:url" content="{{ route('documents') }}">
        <meta property="og:type" content="website">
    @endsection

    {{-- ══════════ HERO ══════════ --}}
    <section class="-mt-20 mb-10">
        <div class="relative overflow-hidden w-full h-52 md:h-64 flex items-end"
             style="background: linear-gradient(135deg, #0e1f05 0%, #1a3a07 45%, #1f0a2e 100%)">
            {{-- Orbes decorativos --}}
            <div class="absolute top-0 right-0 w-80 h-80 rounded-full opacity-10 pointer-events-none"
                 style="background: radial-gradient(circle, #7ea41e, transparent); transform: translate(30%,-30%)"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 rounded-full opacity-10 pointer-events-none"
                 style="background: radial-gradient(circle, #84219f, transparent); transform: translate(-30%,30%)"></div>

            <div class="relative max-w-5xl mx-auto px-4 pb-8 pt-20 w-full">
                <span class="inline-block bg-verdeclaro/20 border border-verdeclaro/40 text-verdeclaro text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-2">
                    IST Cumandá
                </span>
                <h1 class="text-white text-2xl md:text-4xl font-extrabold tracking-tight leading-tight">
                    Documentación Legal
                </h1>
                <p class="text-white/50 text-sm mt-1 hidden md:block">
                    Consulta y descarga los documentos oficiales del instituto
                </p>
            </div>

            <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 28">
                <path fill="#f9fafb" d="M0,16 C480,32 960,0 1440,16 L1440,28 L0,28 Z"/>
            </svg>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 pb-24">
        @livewire('document-viewer')
    </div>
</x-app-layout>
