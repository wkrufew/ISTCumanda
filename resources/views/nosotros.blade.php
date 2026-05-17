<x-app-layout>
    @section('title', '- Quiénes Somos')
    @section('description', 'Conoce la misión, visión y filosofía del Instituto Superior Tecnológico Cumandá. Institución de educación superior técnica comprometida con la formación integral y la excelencia académica en la provincia de Chimborazo, Ecuador.')
    @section('keywords', 'IST Cumandá quiénes somos, misión visión filosofía, Instituto Superior Tecnológico Cumandá, educación técnica Ecuador, Chimborazo, historia institucional')
    @section('url', route('about'))
    @section('img', 'https://images.pexels.com/photos/3184418/pexels-photo-3184418.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2')

    @section('og-tags')
        <meta property="og:url" content="{{ route('about') }}">
        <meta property="og:type" content="article">
        <meta property="og:title" content="Quiénes Somos — IST Cumandá">
    @endsection

    {{-- ══════════ HERO ══════════ --}}
    <section class="-mt-20 mb-10">
        <div class="relative overflow-hidden w-full h-52 md:h-60 flex items-end"
             style="background: linear-gradient(135deg, #0e1f05 0%, #1a3a07 40%, #1f0a2e 100%)">
            <div class="absolute top-0 right-0 w-80 h-80 rounded-full opacity-10 pointer-events-none"
                 style="background: radial-gradient(circle, #e59e20, transparent); transform: translate(30%,-30%)"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 rounded-full opacity-10 pointer-events-none"
                 style="background: radial-gradient(circle, #84219f, transparent); transform: translate(-30%,30%)"></div>
            <div class="absolute inset-0 opacity-[0.03]"
                 style="background-image: repeating-linear-gradient(45deg, #fff 0, #fff 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>

            <div class="relative max-w-5xl mx-auto px-4 pb-8 pt-20 w-full">
                <span class="inline-block bg-verdeclaro/20 border border-verdeclaro/40 text-verdeclaro text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-2">
                    IST Cumandá
                </span>
                <h1 class="text-white text-2xl md:text-4xl font-extrabold tracking-tight leading-tight">
                    Quiénes Somos
                </h1>
                <p class="text-white/50 text-sm mt-1 hidden md:block">
                    Institución de educación superior técnica comprometida con la excelencia académica
                </p>
            </div>

            <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 28">
                <path fill="#f9fafb" d="M0,16 C480,32 960,0 1440,16 L1440,28 L0,28 Z"/>
            </svg>
        </div>
    </section>

    <div class="max-w-5xl mx-auto px-4 pb-24">

        {{-- ══════════ INTRO ══════════ --}}
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-8 md:p-10 flex flex-col justify-center">
                    <span class="inline-block bg-verde/10 text-verde text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full mb-4 w-fit">
                        Nuestro lema
                    </span>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-800 leading-tight mb-4">
                        Educación con <span class="text-verde">excelencia</span> y compromiso
                    </h2>
                    <p class="text-gray-500 leading-relaxed text-sm">
                        El Instituto Superior Tecnológico Cumandá está dedicado completamente a sus estudiantes con ganas de aprender y superarse, velando porque cumplan su meta propuesta y alcancen la excelencia personal y profesional.
                    </p>
                    <div class="mt-6 grid grid-cols-3 gap-3">
                        <div class="text-center p-3 bg-gray-50 rounded-2xl">
                            <p class="text-xl font-extrabold text-verde">+15</p>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wide mt-0.5">Años</p>
                        </div>
                        <div class="text-center p-3 bg-gray-50 rounded-2xl">
                            <p class="text-xl font-extrabold text-verde">+500</p>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wide mt-0.5">Egresados</p>
                        </div>
                        <div class="text-center p-3 bg-gray-50 rounded-2xl">
                            <p class="text-xl font-extrabold text-verde">100%</p>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wide mt-0.5">Compromiso</p>
                        </div>
                    </div>
                </div>
                <div class="relative h-64 md:h-auto overflow-hidden">
                    <img src="https://images.pexels.com/photos/3184418/pexels-photo-3184418.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="IST Cumandá — misión institucional"
                         class="w-full h-full object-cover"
                         loading="lazy" width="600" height="450">
                    <div class="absolute inset-0 md:hidden"
                         style="background: linear-gradient(to top, #fff 0%, transparent 40%)"></div>
                </div>
            </div>
        </div>

        {{-- ══════════ FILOSOFÍA INSTITUCIONAL ══════════ --}}
        <div class="mb-6">
            <h2 class="text-xl md:text-2xl font-extrabold text-gray-800">Filosofía Institucional</h2>
            <p class="text-gray-400 text-sm mt-0.5">Los pilares que definen nuestra identidad como institución</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Filosofía --}}
            <div class="group rounded-3xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md hover:border-verde/20 transition-all duration-300">
                <div class="overflow-hidden">
                    <img src="{{ asset('imagenes/Filosofia.jpeg') }}" alt="Filosofía IST Cumandá"
                         class="w-full object-cover transition-transform duration-500 group-hover:scale-105"
                         loading="lazy" width="450" height="300">
                </div>
            </div>

            {{-- Misión --}}
            <div class="group rounded-3xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md hover:border-morado/20 transition-all duration-300">
                <div class="overflow-hidden">
                    <img src="{{ asset('imagenes/Mision.jpeg') }}" alt="Misión IST Cumandá"
                         class="w-full object-cover transition-transform duration-500 group-hover:scale-105"
                         loading="lazy" width="450" height="300">
                </div>
            </div>

            {{-- Visión --}}
            <div class="group rounded-3xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md hover:border-naranja/20 transition-all duration-300">
                <div class="overflow-hidden">
                    <img src="{{ asset('imagenes/Vision.jpeg') }}" alt="Visión IST Cumandá"
                         class="w-full object-cover transition-transform duration-500 group-hover:scale-105"
                         loading="lazy" width="450" height="300">
                </div>
            </div>

        </div>

        {{-- ══════════ CTA ══════════ --}}
        <div class="mt-10 rounded-3xl overflow-hidden"
             style="background: linear-gradient(135deg, #0e1f05 0%, #1a3a07 60%, #1f0a2e 100%)">
            <div class="px-8 md:px-12 py-10 flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <p class="text-white/50 text-xs uppercase tracking-widest font-bold mb-1">¿Tienes alguna pregunta?</p>
                    <h3 class="text-white text-xl md:text-2xl font-extrabold leading-tight">Estamos aquí para ayudarte</h3>
                    <p class="text-white/60 text-sm mt-2">Nuestro equipo está listo para orientarte en tu camino académico.</p>
                </div>
                <a href="{{ route('contact') }}"
                   class="shrink-0 inline-flex items-center gap-2 px-7 py-3.5 rounded-2xl text-sm font-bold text-white transition hover:opacity-90 active:scale-95"
                   style="background: linear-gradient(135deg, #e59e20, #d97706)">
                    <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                    Contáctanos
                </a>
            </div>
        </div>

    </div>

</x-app-layout>
