<x-app-layout>
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    @section('title', '| BIENVENIDO')
    @section('description',
        'Obtén una educación de calidad en ' .
        ($settings->site_name ?? 'ISTCumanda') .
        ' para un
        futuro lleno de oportunidades.')
    @section('keywords',
        'educación, ' .
        ($settings->site_name ?? 'ISTCumanda') .
        ', futuro, oportunidades, calidad
        educativa')
    @section('url', config('app.url'))
    @section('img', asset('imagenes/logo_pro.webp'))

    @section('og-tags')
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:type" content="website">
    @endsection

    <section id="inicio" class="h-screen relative overflow-hidden -mt-16 md:-mt-20"
        style="background: url('{{ asset('imagenes/portada_pro.jpeg') }}') center center / cover no-repeat fixed;">
        <div class="absolute top-0 right-0 w-full h-screen bg-black/60"></div>
        <div class="bg-cover max-w-full mx-2 md:mx-6 px-2 sm:px-2 lg:px-4 pt-6 md:pt-10 py-3">
            <div class="flex flex-col w-full md:w-full justify-center text-center md:text-left">
                <div class="lg:pt-12 pt-6 w-full px-2 md:px-4 mx-auto">
                    <div class="relative flex flex-col min-w-0 break-words bg-transparent w-full mb-8">
                        <div class="px-1 py-4 flex-auto tituloportada">
                            <h1
                                class="texto-portada text-center text-green-50 my-4 text-3xl lg:text-4xl font-bold leading-tight mt-44 md:mt-28">
                                <b
                                    class="text-verdeclaro">{{ $settings->site_title_portada ? $settings->site_title_portada : 'INSTITUTO SUPERIOR TECNOLÓGICO CUMANDÁ' }}</b>
                            </h1>
                            <h2 class="text-gray-100 text-center text-xl md:text-3xl mb-8 w-full md:w-1/2 mx-auto">

                                {{ $settings->site_subtitle_portada ? $settings->site_subtitle_portada : 'Educación de calidad para un futuro con mejores oportunidades' }}
                            </h2>
                        </div>
                        <div class="flex justify-center">
                            <div class="botonesportada-1">
                                <a href="https://docs.google.com/forms/d/e/1FAIpQLSeoDD8lGHJHnno-TDkHo78-5UnaHlquZttyP26iiEUzwUccsg/viewform"
                                    target="_blank"
                                    class="bg-verdeclaro text-zinc-800 font-semibold px-6 py-1 rounded-full hover:bg-transparent border-2 border-verdeclaro hover:text-verdeclaro transition duration-300 ease-in-out transform hover:-translate-y-0.5 hover:scale-105">Matricúlate</a>
                            </div>
                            <div class="botonesportada-2 ml-10">
                                <a href="{{ route('course.index') }}"
                                    class="border-2 border-[#d09107] text-zinc-800 font-semibold bg-[#e59e20] px-6 py-1 rounded-full hover:bg-[#d09107] hover:text-zinc-800 transition duration-300 ease-in-out transform hover:-translate-y-0.5 hover:scale-105">Carreras</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="botonsaltarin flex items-end text-center justify-center mt-16 md:mt-20 relative z-30 botonscrol">
                    <a href="#frase" class="w-6 h-10 border-2 border-verdeclaro bg-white/80 rounded-full">
                        <svg class="animate-bounce z-30 w-full h-full mx-auto text-verdeclaro cursor-pointer"
                            fill="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="left-0 bottom-0 min-w-full absolute">
            <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                            opacity="0.100000001"></path>
                        <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001"></path>
                        <path
                            d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                            opacity="0.200000003"></path>
                    </g>
                    <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                        </path>
                    </g>
                </g>
            </svg>
        </div>
    </section>
    {{-- frase motivadora --}}
    <section id="frase" class="bg-white relative py-24 -mt-[0.5px] -mb-[1px]">
        <div class="max-w-6xl mx-auto text-center px-6">
            <div class="flex flex-col items-center">
                <!-- Título y icono -->
                <div class="mb-6 flex flex-col items-center">
                    <img src="https://images.pexels.com/photos/3651820/pexels-photo-3651820.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="Innovación y tecnología" class="w-24 h-24 rounded-full shadow-sm ">
                    <h2 class="text-3xl font-bold text-naranja mt-4 uppercase">Nuestro Compromiso</h2>
                </div>

                <!-- Frase con comillas -->
                <div class="bg-white p-8 relative">
                    <span class="absolute top-0 left-0 -mt-6 -ml-6 text-6xl text-naranja font-bold">“</span>
                    <p class="text-xl md:text-2xl text-gray-800 italic font-semibold">
                        Formamos profesionales innovadores para liderar en un mundo en constante evolución, donde la
                        educación de calidad impulsa el desarrollo sostenible y el progreso tecnológico.
                    </p>
                    <span class="absolute bottom-0 right-0 -mb-6 -mr-6 text-6xl text-naranja font-bold">”</span>
                </div>
            </div>
        </div>
        {{--  <div class="max-w-7xl mx-auto text-center px-6">
            <h2 class="text-2xl md:text-4xl font-bold text-neutral-800">
                Formamos profesionales innovadores para liderar en un mundo en constante evolución, donde la educación
                de calidad impulsa el desarrollo sostenible y el progreso tecnológico.
            </h2>
        </div> --}}
    </section>
    {{-- INSTITUCION --}}
    <section id="tecnologias" class="relative bg-verde pt-10 md:pt-1 pb-24 md:pb-36 z-30 overflow-hidden">
        <div class="left-0 top-0 -mt-[1px] min-w-full absolute transform rotate-180">
            <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <g stroke="none" stroke-width="0" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                            opacity="0.100000001"></path>
                        <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001"></path>
                        <path
                            d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                            opacity="0.200000003"></path>
                    </g>
                    <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                        </path>
                    </g>
                </g>
            </svg>
        </div>
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 h-full mb-0 md:mb-0 mt-10 md:mt-48">
            <div class="seccion-institucion-1 flex justify-center items-center  md:mb-0 p-10 md:p-10">
                <div class="relative">
                    <div class="absolute -inset-0.5 bg-verde animate-pulse rounded-lg blur p-20"></div>
                    <style>
                        .foton {
                            width: 480px;
                            height: 320;
                        }
                    </style>
                    <img loading="lazy"
                        class="relative foton object-cover bg-cover object-center rounded-2xl shadow-none md:shadow-md md:shadow-verde/50"
                        src="{{ asset('https://images.pexels.com/photos/9572347/pexels-photo-9572347.jpeg?auto=compress&cs=tinysrgb&h=320&w=480') }}"
                        alt="portada">
                </div>
            </div>
            <div class="seccion-institucion-2 flex flex-col justify-center items-left px-6 ">
                <header class="text-white text-xl font-semibold uppercase">Institución</header>
                <h2 class="text-white text-3xl font-bold py-2">INSTITUTO SUPERIOR TECNOLÓGICO CUMANDÁ</h2>
                <p class="text-gray-100 py-1 text-lg">
                    Primer instituto dedicado al pueblo Cumandense guiado por principios consagrados en la constitución
                    de la República del Ecuador, Tratados y Convenios Internacionales, dispuestos a servir a la
                    comunidad y brindar conocimiento de excelencia.
                </p>
                {{-- <a class="mt-5 mb-12 md:mb-0 px-3 py-1.5 rounded-full border-2 w-36 text-center text-base md:text-sm text-verde border-verde shadow-lg shadow-verde/30"
                    href="#inicio">Leer mas
                </a> --}}
            </div>
        </div>
        <div class="left-0 bottom-0 -mb-[1px] min-w-full absolute">
            <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <g stroke="none" stroke-width="0" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                            opacity="0.100000001"></path>
                        <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001"></path>
                        <path
                            d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                            opacity="0.200000003"></path>
                    </g>
                    <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                        </path>
                    </g>
                </g>
            </svg>
        </div>
    </section>
    {{-- ESTRUCTURA DE LA INSTITUCION --}}
    <section id="estructura" class="pb-10 pt-20 bg-white relative -mt-[0.5px] ">
        <div>
            <header class="text-center px-4">
                <h2 class="text-lg font-semibold text-verde">NUESTRO MODELO EDUCATIVO</h2>
                <h3 class="text-3xl font-bold text-naranja py-2">DEDICADO 100% A LOS ESTUDIANTES</h3>

            </header>
            <div class="max-w-4xl mx-auto grid grid-cols-1 lg:grid-cols-3 py-20">
                <div class="m-1 col-span-1 lg:col-span-3">
                    <div
                        class="relative w-64 h-48 mx-auto lg:mr-auto bg-verde text-zinc-200 px-1.5 rounded-lg pt-10 text-center border-2 border-verdeclaro">
                        <h4 class="py-2 uppercase text-sm font-semibold">Formación profesional</h4>
                        <ul class="text-xs font-medium text-zinc-200 list-disc list-outside ml-5 text-left">
                            <li>Excelencia académica.</li>
                            <li>Innovación y espíritu emprendedor.</li>
                            <li>Visión directiva y trabajo en equipo.</li>
                            <li>Calidad académica reconocida y acreditada.</li>
                        </ul>
                        <div
                            class="absolute -top-10 right-1/3 w-20 h-20 rounded-full bg-white border border-verdeclaro p-1 flex justify-center items-center">
                            <i class="fas fa-briefcase text-4xl text-verdeclaro"></i>
                        </div>
                    </div>
                </div>
                <div class="m-1 mt-16 lg:mt-0">
                    <div
                        class="relative w-64 h-48 mx-auto lg:mr-auto bg-verde text-zinc-200 px-1.5 rounded-lg pt-10 text-center border-2 border-verdeclaro">
                        <h4 class="py-2 uppercase text-sm font-semibold">Formación intelectual</h4>
                        <ul class="text-xs font-medium text-zinc-200 list-disc list-outside ml-5 text-left">
                            <li>Pensamiento crítico.</li>
                            <li>Capacidad de análisis y síntesis.</li>
                            <li>Resolución de problemas.</li>
                            <li>Toma de decisiones.</li>
                        </ul>
                        <div
                            class="absolute -top-10 right-1/3 w-20 h-20 rounded-full bg-white border border-verdeclaro p-1 flex justify-center items-center">
                            <i class="fas fa-lightbulb text-4xl text-verdeclaro"></i>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <div class="m-1 flex justify-center items-center">
                        <img loading="lazy" class="rounded-full w-32 h-32 object-center object-cover"
                            src="{{ asset('imagenes/icono.webp') }}" alt="centro">
                    </div>
                </div>
                <div class="m-1 mt-16 lg:mt-0">
                    <div
                        class="relative w-64 h-48 mx-auto lg:mr-auto bg-verde text-zinc-200 px-1.5 rounded-lg pt-10 text-center border-2 border-verdeclaro">
                        <h4 class="py-2 uppercase text-sm md:text-base font-semibold">Formación humana</h4>
                        <ul class="text-xs font-medium text-zinc-200 list-disc list-outside ml-5 text-left">
                            <li>Dignidad y centralidad de la persona</li>
                            <li>Desarrollo de una afectividad madura</li>
                            <li>Capacidad de socialización</li>
                            <li>Valores éticos</li>
                        </ul>
                        <div
                            class="absolute -top-10 right-1/3 w-20 h-20 rounded-full bg-white border border-verdeclaro p-1 flex justify-center items-center">
                            <i class="fas fa-user text-4xl text-verdeclaro"></i>
                        </div>
                    </div>
                </div>
                <div class="m-1 col-span-1 lg:col-span-3 mt-16 lg:mt-0">
                    <div
                        class="relative w-64 h-48 mx-auto lg:mr-auto bg-verde text-zinc-200 px-1.5 rounded-lg pt-10 text-center border-2 border-verdeclaro">
                        <h4 class="py-2 uppercase text-sm font-semibold">Formación social</h4>
                        <ul class="text-xs font-medium text-zinc-200 list-disc list-outside ml-5 text-left">
                            <li>Promoción de la salud.</li>
                            <li>Solidaridad y vivencia de la caridad.</li>
                            <li>Equidad entre las personas.</li>
                            <li>Profundo sentido de la responsabilidad social.</li>
                        </ul>
                        <div
                            class="absolute -top-10 right-1/3 w-20 h-20 rounded-full bg-white border border-verdeclaro p-1 flex justify-center items-center">
                            <i class="fas fa-heart text-4xl text-verdeclaro"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- TECNOLOGIAS  --}}
    <section id="tecnologias" class="relative bg-verde pt-10 md:pt-32 z-30">
        <div class="left-0 top-0 -mt-[1px] min-w-full absolute transform rotate-180">
            <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                            opacity="0.100000001"></path>
                        <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001"></path>
                        <path
                            d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                            opacity="0.200000003"></path>
                    </g>
                    <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                        </path>
                    </g>
                </g>
            </svg>
        </div>
        <div class="max-w-6xl mx-auto overflow-hidden lg:pb-8 xl:pb-14">
            <div class="titulo-tecnologias text-3xl font-bold text-zinc-200 text-center py-16">TECNOLOGÍAS CON APERTURA
            </div>
            <div class="max-w-7xl mx-auto px-1 sm:px-6 lg:px-8 pb-16 md:pb-44">
                @if ($tecnologys->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($tecnologys as $key => $item)
                            <a href="{{ route('course.show', $item) }}"
                                class="curso-{{ $key + 1 }} group block rounded-lg p-4 shadow-sm hover:shadow-md shadow-verdeclaro  hover:shadow-verdeclaro bg-gray-50">
                                <img alt="{{ $item->title }}" src="{{ Storage::url($item->image->url) }}"
                                    class="h-56 w-full rounded-md object-cover" />
                                <div class="mt-1">
                                    <dl>
                                        <div>
                                            <dd class="text-sm text-gray-500">{{ $item->category->name }}</dd>
                                        </div>
                                        <div>
                                            <dd class="font-medium line-clamp-1 text-verde">{{ $item->title }}
                                            </dd>
                                        </div>
                                        <p class="line-clamp-2 mt-1 text-black text-xs font-normal">
                                            {!! Str::limit($item->description, 70) !!}
                                        </p>
                                    </dl>
                                </div>
                                <hr class="my-2">
                                <div class="flex items-center justify-between gap-8 text-xs">
                                    <div class="flex flex-row gap-2 items-center">
                                        <svg class="size-4 fill-verdeclaro" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                        </svg>

                                        <div class="mt-1.5 sm:mt-0">
                                            <p class="text-gray-500">Duración</p>

                                            <p class="font-medium text-xs line-clamp-1">
                                                {{ $item->duration }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex flex-row items-center justify-center gap-2">
                                        <svg class="size-4 fill-verdeclaro" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                        </svg>

                                        <div class="mt-1.5 sm:mt-0">
                                            <p class="text-gray-500">Modalidad</p>

                                            <p class="font-medium">
                                                {{ $item->modality }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="flex justify-center w-full">
                                <p class="text-gray-500 text-center">Proximamente tecnologías disponibles</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="flex justify-center mt-4 pb-4 md:pb-6">
                        <a href="{{ route('course.index') }}"
                            class="font-medium inline-flex text-center text-white bg-transparent border-2 border-dashed hover:border-solid text-sm border-white rounded-full px-3 py-1.5 mt-4 hover:bg-verdeclaro hover:text-white">Ver
                            Cursos</a>
                    </div>
                @else
                    <div class="flex justify-center w-full pb-4 mb-10">
                        <p class="text-gray-400 text-center">Proximamente tecnologías disponibles</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="left-0 bottom-0 -mb-[1px] min-w-full absolute">
            <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                            opacity="0.100000001"></path>
                        <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001"></path>
                        <path
                            d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                            opacity="0.200000003"></path>
                    </g>
                    <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                        </path>
                    </g>
                </g>
            </svg>
        </div>
    </section>
    {{-- SECCION DE POR QUE ELEGIR EL INSTITUTO --}}
    <section id="elegir" class="bg-white py-20 relative seccion porque-elegirnos z-20">
        <div class="max-w-5xl mx-auto lg:pt-2 lg:pb-9">
            <div class="flex flex-wrap text-center justify-center">
                <div class="w-full lg:w-3/4">
                    <div class="flex-shrink-0 flex justify-center mb-2">
                        <img loading="lazy" class="block w-36 h-36 object-center rounded-full"
                            src="{{ asset('imagenes/icono.webp') }}" alt="logo">
                    </div>
                    <h2 class="text-3xl font-bold py-10 text-naranja uppercase">
                        ¿POR QUÉ ELEGIR al INSTITUTO SUPERIOR TECNOLÓGICO CUMANDÁ?
                    </h2>
                </div>
            </div>
            <div class="flex flex-wrap mt-12 justify-center">
                <div class="w-full lg:w-1/3 px-4 text-center">
                    <div
                        class="bg-verdeclaro border-2 border-verdeclaro w-20 h-20 rounded-full flex justify-center items-center mx-auto">
                        <i class="fas fa-compress-arrows-alt text-3xl text-white"></i>
                    </div>
                    <p class="mt-2 mb-4 text-neutral-700 font-medium">
                        Ofrecemos un medio concreto para una buena experiencia universitaria.
                    </p>
                </div>
                <div class="w-full lg:w-1/3 px-4 text-center">
                    <div class="bg-verdeclaro w-20 h-20 rounded-full flex justify-center items-center mx-auto">
                        <i class="fas fa-briefcase text-3xl text-white"></i>
                    </div>
                    <p class="mt-2 mb-4 text-neutral-700 font-medium">
                        Impulsamos al talento y al compromiso personal para favorecer a la sociedad.
                    </p>
                </div>
                <div class="w-full lg:w-1/3 px-4 text-center">
                    <div class="bg-verdeclaro w-20 h-20 rounded-full flex justify-center items-center mx-auto">
                        <i class="fas fa-award text-3xl text-white"></i>
                    </div>
                    <p class="mt-2 mb-4 text-neutral-700 font-medium">
                        Contamos con un profesorado con grado superior y alta experiencia profesional.
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap mt-4 justify-center">
                <div class="w-full lg:w-1/3 px-4 text-center">
                    <div class="bg-verdeclaro w-20 h-20 rounded-full flex justify-center items-center mx-auto">
                        <i class="fas fa-book-reader text-3xl text-white"></i>
                    </div>
                    <p class="mt-2 mb-4 text-neutral-700 font-medium">
                        Implementamos novedosos planes de estudios centrados en el crecimiento personal y profesional a
                        través de la excelencia académica.
                    </p>
                </div>
                <div class="w-full lg:w-1/3 px-4 text-center">
                    <div class="bg-verdeclaro w-20 h-20 rounded-full flex justify-center items-center mx-auto">
                        <i class="fas fa-people-carry text-3xl text-white"></i>
                    </div>
                    <p class="mt-2 mb-4 text-neutral-700 font-medium">
                        Promovemos una formación humanística orientada hacia el desarrollo científico y tecnológico.
                    </p>
                </div>
                <div class="w-full lg:w-1/3 px-4 text-center">
                    <div class="bg-verdeclaro w-20 h-20 rounded-full flex justify-center items-center mx-auto">
                        <i class="fas fa-lightbulb text-3xl text-white"></i>
                    </div>
                    <p class="mt-2 mb-4 text-neutral-700 font-medium">
                        Buscamos la innovación y el espíritu emprendedor de nuestros alumnos a través de una formación
                        multidisciplinaria.
                    </p>
                </div>
            </div>
        </div>
    </section>
    {{-- BOTON DE DUDAS --}}
    <section id="dudas"
        class="seccion-dudas z-30 relative bg-naranja text-gray-50 text-center pb-10 md:pb-44 pt-16 md:pt-48 select-none">
        <div class="left-0 top-0 -mt-[1px] min-w-full absolute transform rotate-180">
            <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                            opacity="0.100000001"></path>
                        <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001"></path>
                        <path
                            d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                            opacity="0.200000003"></path>
                    </g>
                    <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                        </path>
                    </g>
                </g>
            </svg>
        </div>
        <div class="pb-10 xl:pt-20">
            <h2 class="text-2xl md:text-4xl text-center font-semibold py-2 text-white">
                {{-- TIENES DUDAS HACERCA DEL PROCESO DE MATRICULACION? --}}
                CONSIGUE TU TÍTULO DE TERCER NIVEL EN 2 AÑOS
            </h2>
            <h3 class="text-lg md:text-2xl font-semibold">
                {{-- ESCRIBENOS VIA WHATSAPP Y TE ATENDEREMOS DE INMEDIATO. --}}
                ¿TIENES DUDAS ACERCA DEL PROCESO DE MATRICULACIÓN?
            </h3>
        </div>
        @php
            $mensaje = 'Hola ISTCumandá deseo saber mas sobre su prestigiosa institución...';
            $mensajeReemplazado = str_replace(' ', '%20', $mensaje);
        @endphp
        <div class="flex justify-center pb-2 xl:pb-20">
            <a href="https://api.whatsapp.com/send?phone={{ $settings->site_phone_1 }}&text={{ $mensajeReemplazado }}"
                target="_blank"
                class="transition duration-300 uppercase ease transform hover:-translate-y-1 hover:scale-110 text-lg group center py-1 px-5 rounded-full bg-white text-naranja font-semibold hover:bg-neutral-800 hover:text-white">
                Escríbenos <i
                    class="fab fa-whatsapp text-naranja group-hover:text-white text-xl cursor-pointer ml-2"></i>
            </a>
        </div>
        <div class="left-0 bottom-0 -mb-[1px] min-w-full absolute bg-naranja">
            <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                            opacity="0.100000001"></path>
                        <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001"></path>
                        <path
                            d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                            opacity="0.200000003"></path>
                    </g>
                    <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path
                            d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                        </path>
                    </g>
                </g>
            </svg>
        </div>
    </section>
    {{-- acuerdos con la institucion --}}
    <section id="acuerdos" class="relative bg-white pt-24 pb-44 -mt-[1px] overflow-hidden">
        <div class="max-w-sm mx-auto">
            <h2 class="text-center font-bold text-verdeclaro text-2xl md:text-3xl pb-16 acuerdo-titulo">AVALADOS POR
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 ml-10 md:ml-0">
                <div
                    class="acuerdo-1 bg-verde hover:text-white text-white md:text-white cursor-pointer mx-auto flex justify-center items-center hover:w-52 w-52  md:w-0 transition-all duration-500 h-20 relative rounded-r-full rounded-l-none">
                    <a href="https://www.caces.gob.ec/" target="_blank" rel="noopener noreferrer">
                        <div class="px-4 font-bold uppercase text-base">CACES</div>
                        <div class="absolute top-0 -left-10 w-20 h-20 rounded-full block bg-verde p-1">
                            <img loading="lazy" class="w-full h-full rounded-full object-cover object-center"
                                src="{{ asset('imagenes/caces.jpg') }}" alt="caces">
                        </div>
                    </a>
                </div>
                <div
                    class="acuerdo-2 bg-verde hover:text-white text-white md:text-white cursor-pointer mx-auto flex justify-center items-center hover:w-52 w-52  md:w-0 transition-all duration-500 h-20 relative rounded-r-full rounded-l-none">
                    <a href="https://www.educacionsuperior.gob.ec/" target="_blank" rel="noopener noreferrer">
                        <div class="px-4 font-bold uppercase text-base"> SENESCYT</div>
                        <div class="absolute top-0 -left-10 w-20 h-20 rounded-full block bg-verde p-1">
                            <img loading="lazy" class="w-full h-full rounded-full object-cover object-center"
                                src="{{ asset('imagenes/senescyt.jpg') }}" alt="senescyt">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
