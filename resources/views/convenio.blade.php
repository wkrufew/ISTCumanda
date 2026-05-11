<x-app-layout>

    @section('title', '- CONVENIOS')
    @section('description',
        'Explora los convenios que ' .
        ($settings->site_name ?? 'ISTCumanda') .
        ' tiene con diversas
        instituciones para mejorar la educación.')
    @section('keywords',
        'convenios, educación, ' .
        ($settings->site_name ?? 'ISTCumanda') .
        ', instituciones,
        oportunidades')
    @section('url', route('convenios'))
    @section('img',
        asset('https://images.pexels.com/photos/5583250/pexels-photo-5583250.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'))

    @section('og-tags')
        <meta property="og:url" content="{{ route('convenios') }}">
        <meta property="og:type" content="article">
    @endsection
    {{-- FIN SEO --}}

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    @endpush
    <section id="inicio" class="overflow-hidden rounded-b-xl -mt-20 bg-cover bg-center bg-no-repeat h-56 md:h-72"
        style="background-image: url('https://images.pexels.com/photos/5583250/pexels-photo-5583250.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
        <div class="bg-black/50 p-8 md:p-12 lg:px-16 lg:py-32 h-full">
            <div class="max-w-4xl mx-auto flex justify-center h-full items-center">
                <h1 class="text-lg font-bold text-white sm:text-2xl md:text-3xl mt-10 md:mt-0 text-center uppercase">
                    {{ __(' "Unimos fuerzas para abrir más puertas hacia el éxito" ') }}
                </h1>
            </div>
        </div>
    </section>

    <div class="mt-10 md:pb-6">
        <div class="max-w-5xl mx-auto px-8 sm:px-6 lg:px-10 text-gray-600 md:px-12 xl:px-6">
            <div class="space-y-0 md:flex md:gap-6 lg:items-center justify-center lg:gap-12">
                <div class="md:5/12 lg:w-5/12 h-auto md:h-72">
                    <img class="rounded-lg"
                        src="https://images.pexels.com/photos/5684551/pexels-photo-5684551.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="image" loading="lazy" width="" height="">
                </div>
                <div class="md:7/12 lg:w-6/12 h-48 md:h-72 flex flex-col items-center justify-center">
                    <h2 class="text-2xl text-gray-900 font-semibold md:text-4xl">
                        {{ __('Forjando Alianzas para el Futuro') }}
                    </h2>
                    <p class="mt-3 md:mt-6 text-gray-600 text-center">
                        "Nuestras alianzas estratégicas fortalecen el camino hacia una educación integral, conectando
                        oportunidades globales con el talento local."
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="relative pb-0 md:pb-28 mt-0 md:mt-16">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 p-6">

            <div class="flex flex-col justify-center order-2 md:order-1 convenio-1 relative">
                <header class="text-verde text-xl font-semibold uppercase text-left">Convenio</header>
                <h2 class="text-3xl font-bold py-2 text-left">Cooperacion Interinstitucional entre la Camara de Comercio Provincial de Turismo del Guayas</h2>
                <p class="text-neutral-700 py-2 text-lg text-left">
                    La Cámara de Turismo del Guayas y el Instituto Superior Tecnológico Cumandá celebran una alianza estratégica mediante un convenio interinstitucional, que busca fortalecer la formación académica, la innovación y las oportunidades de desarrollo para los futuros profesionales del sector turístico.
                    <br>
                    🎓 Este acuerdo impulsa el trabajo conjunto en proyectos educativos, prácticas preprofesionales, capacitaciones y actividades que contribuyan al crecimiento del turismo sostenible en la región.
                </p>
                <div class="flex items-center space-x-4 mt-4">
                    <button href="{{ asset('documentos/convenios/convenio_ctg.pdf') }}" data-fancybox
                        data-caption="Documento del Convenio" data-type="pdf"
                        class="border-2 border-verde text-verde px-4 py-2 rounded-full text-sm font-semibold">VER CONVENIO</button>
                </div>
            </div>

            <div class="relative h-72 md:h-auto convenio-2 flex justify-center items-center order-1 md:order-2">
                <a class="" href="{{ asset('imagenes/convenio/CAMARA_COMERCIO_GUAYAS.jpeg') }}"
                    data-caption="CONVENIO CON LA CAMARA DE COMERCIO DEL GUAYAS">
                    <img loading="lazy"
                        class="z-30 absolute left-1/2 transform -translate-x-1/2 top-0 h-64 md:h-auto w-96 lg:w-6/12 object-cover object-left-top rounded-lg border-2 border-verde"
                        src="{{ asset('imagenes/convenio/CAMARA_COMERCIO_GUAYAS.jpeg') }}" alt="CAMARA COMERCIO GUAYAS">
                </a>
            </div>
        </div>
    </section>

    <section class="relative pb-0 md:pb-28 mt-0 md:mt-16">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 p-6">

            <div class="flex flex-col justify-center order-2 md:order-1 convenio-1 relative">
                <header class="text-verde text-xl font-semibold uppercase text-left">Convenio</header>
                <h2 class="text-3xl font-bold py-2 text-left">Convenio de Cooperación en Ibarra</h2>
                <p class="text-neutral-700 py-2 text-lg text-left">
                    El Instituto Superior Tecnológico Cumandá, firma convenio de cooperación educativa con un centro de capacitación en la ciudad de Ibarra.
                    Con ello, la ciudadanía en general de Ibarra podrá acceder a información de los programas académicos que oferta el Instituto.
                    Caminamos juntos por una educación superior de calidad.
                </p>
                <div class="flex items-center space-x-4 mt-4">
                    <button href="{{ asset('documentos/convenios/convenio_luis_salas.pdf') }}" data-fancybox
                        data-caption="Documento del Convenio" data-type="pdf"
                        class="border-2 border-verde text-verde px-4 py-2 rounded-full text-sm font-semibold">VER CONVENIO</button>
                </div>
            </div>

            <!--<div class="relative h-72 md:h-auto convenio-2 flex justify-center items-center order-1 md:order-2">
                <a class="" href="{{ asset('imagenes/convenio/luis_salas.jpeg') }}"
                    data-caption="LUIS ARMANDO SALAS SUBIA">
                    <img loading="lazy"
                        class="z-30 absolute left-1/2 transform -translate-x-1/2 top-0 h-64 md:h-auto w-96 lg:w-6/12 object-cover object-left-top rounded-lg border-2 border-verde"
                        src="{{ asset('imagenes/convenio/luis_salas.jpeg') }}" alt="LUIS ARMANDO SALAS SUBIA">
                </a>
            </div>-->
        </div>
    </section>

    <section class="relative pb-0 md:pb-28 mt-0 md:mt-16">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 p-6">

            <div class="flex flex-col justify-center order-2 md:order-1 convenio-1">
                <header class="text-verde text-xl font-semibold uppercase text-left">Convenio</header>
                <h2 class="text-3xl font-bold py-2 text-left">Cooperacion Interinstitucional entre la Comisión de Tránsito del Ecuador</h2>
                <p class="text-neutral-700 py-2 text-lg text-left">
                    Convenio I Comision de Transito :La Comisión de Tránsito del Ecuador y el Instituto Superior Tecnológico Cumandá suscriben un convenio de cooperación interinstitucional que establece una alianza estratégica orientada al desarrollo, aval y ejecución de programas de capacitación y formación académica continua dirigidos al personal de la CTE.
                <br><br>
                Mediante este acuerdo, ambas instituciones se comprometen a articular esfuerzos para fortalecer las competencias técnicas y profesionales de los servidores, garantizando la calidad, validez y certificación de los procesos formativos, así como su pertinencia en función de las necesidades institucionales y el mejoramiento del servicio público.
                </p>
                <!--<p class="text-neutral-700 py-2 text-lg text-left">
                    La Comisión de Tránsito del Ecuador mediante el presente instrumento se obliga a:
                </p>
                <ul>
                    <li>
                        1. Garantizar que los cursos y programas de capacitación impartidos cuenten con
el aval académico y la certificación correspondiente del Instituto.

                    </li>
                    <li>
                        2. Reconocer las capacitaciones certificadas para que sean registradas e
incorporadas en la hoja de vida institucional de los servidores de la CTE.
                    </li>
                    <li>
                        3. Compartir información académica pertinente y actualizada que contribuya al
fortalecimiento profesional de los participantes.
                    </li>
                    <li>
                        4. Socializar el presente Convenio con los servidores policiales de la Comisión de
Tránsito del Ecuador, promoviendo e incentivando su participación activa en los
programas de formación continua ofertados por el Instituto.
                    </li>
                    <li>
                        5. Desarrollar los cursos y capacitaciones con responsabilidad, asegurando la
calidad académica y la pertinencia de los contenidos.
                    </li>
                    <li>
                        6. Promover la educación permanente como un eje fundamental para la
profesionalización y el desarrollo de las competencias del talento humano de la
Comisión de Tránsito del Ecuador.
                    </li>
                </ul>-->
                <div class="flex items-center space-x-4 mt-4">
                    <!--<a href="https://www.parmentierformacion.com/" target="_blank"
                        class="bg-verde text-neutral-100 px-4 py-2 rounded-full text-sm font-semibold">IR A
                        PARMENTIER</a> -->
                    <button href="{{ asset('documentos/convenios/convenio_cte.pdf') }}" data-fancybox
                        data-caption="Documento del Convenio" data-type="pdf"
                        class="border-2 border-verde text-verde px-4 py-2 rounded-full text-sm font-semibold">VER CONVENIO 1</button>
                        <button href="{{ asset('documentos/convenios/convenio_cte2.pdf') }}" data-fancybox
                        data-caption="Documento del Convenio 2" data-type="pdf"
                        class="border-2 border-verde text-verde px-4 py-2 rounded-full text-sm font-semibold">VER CONVENIO 2</button>
                </div>
            </div>

            <div class="relative h-72 md:h-auto order-1 md:order-2 convenio-2">
                <a class="" href="{{ asset('imagenes/convenio/convenio_cte_1.webp') }}" data-fancybox="gallery"
                    data-caption="COMISIÓN DE TRÁNSITO DEL ECUADOR">
                    <img loading="lazy"
                        class="z-20 absolute left-1/2 transform -translate-x-1/2 top-0 h-64 md:h-72 object-cover object-left-top rounded-lg border-2 border-verde"
                        src="{{ asset('imagenes/convenio/convenio_cte_1.webp') }}" alt="CAMARA COMERCIO GUAYAS">
                </a>
                <a class="hidden md:block" href="{{ asset('imagenes/convenio/convenio_cte_2.webp') }}"
                    data-fancybox="gallery" data-caption="PERSONAL DE LA CTE">
                    <img loading="lazy"
                        class="z-30 absolute right-0 top-1/3 transform translate-y-7 w-48 h-60 object-cover object-left-top rounded-lg border-2 border-verde"
                        src="{{ asset('imagenes/convenio/convenio_cte_2.webp') }}" alt="imagen 2">
                </a>
            </div>
        </div>
    </section>

    <section class="relative pb-0 md:pb-28 mt-0 md:mt-16">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 p-6">

            <div class="flex flex-col justify-center order-2 md:order-1 convenio-1 relative">
                <header class="text-verde text-xl font-semibold uppercase text-left">Convenio</header>
                <h2 class="text-3xl font-bold py-2 text-left">Cooperación Interinstitucional entre la Academia de Aviación West Pacific Fly CIA. Ltda.</h2>
                <p class="text-neutral-700 py-2 text-lg text-left">
                    Convenio con West Pacific:El Instituto Superior Tecnológico Cumandá y la Academia de Aviación West Pacific Fly Cía. Ltda. suscriben un convenio académico que establece una alianza estratégica orientada a la formación profesional en el ámbito aeronáutico, permitiendo que los estudiantes de la academia accedan a un título de tercer nivel en la carrera de Planificación y Gestión de la Aviación, bajo una modalidad híbrida.
                <br><br>
                Mediante este acuerdo, ambas instituciones se comprometen a articular esfuerzos en docencia, investigación, infraestructura y validación de conocimientos, garantizando la calidad, validez y pertinencia de los procesos formativos, así como el reconocimiento académico y la certificación oficial conforme a la normativa vigente.
                </p>
                <div class="flex items-center space-x-4 mt-4">
                    <button href="{{ asset('documentos/convenios/convenio_aawpf.pdf') }}" data-fancybox
                        data-caption="Documento del Convenio" data-type="pdf"
                        class="border-2 border-verde text-verde px-4 py-2 rounded-full text-sm font-semibold">VER CONVENIO</button>
                </div>
            </div>
        </div>
    </section>
    <section class="relative pb-0 md:pb-28 mt-0 md:mt-16">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 p-6">

            <div class="flex flex-col justify-center order-2 md:order-1 convenio-1 relative">
                <header class="text-verde text-xl font-semibold uppercase text-left">Convenio</header>
                <h2 class="text-3xl font-bold py-2 text-left">CONVENIO DE COOPERACIÓN INTERINSTITUCIONAL ENTRE EL CENTRO DE CAPACITACIÓN RENACER Y EL INSTITUTO SUPERIOR TECNOLÓGICO CUMANDÁ</h2>
                <p class="text-neutral-700 py-2 text-lg text-left">
                    Convenio con Instituto Renace: El Instituto Superior Tecnológico Cumandá y el Centro de Capacitación Renacer suscriben un convenio de cooperación interinstitucional que establece una alianza estratégica orientada al desarrollo y fortalecimiento de actividades académicas, formativas, investigativas y de vinculación con la sociedad, promoviendo el trabajo conjunto en beneficio de la comunidad.
<br><br>
Mediante este acuerdo, ambas instituciones se comprometen a articular esfuerzos para la ejecución de programas, proyectos y procesos de capacitación, así como para la difusión de la oferta académica del Instituto, garantizando el acceso a educación superior tecnológica de calidad, pertinente y conforme a la normativa vigente.
                </p>
                <div class="flex items-center space-x-4 mt-4">
                    <button href="{{ asset('documentos/convenios/convenio_ccr_1.pdf') }}" data-fancybox
                        data-caption="Documento del Convenio" data-type="pdf"
                        class="border-2 border-verde text-verde px-4 py-2 rounded-full text-sm font-semibold">VER CONVENIO</button>
                </div>
            </div>

            <!--<div class="relative h-72 md:h-auto convenio-2 flex justify-center items-center order-1 md:order-2">
                <a class="" href="{{ asset('imagenes/convenio/luis_salas.jpeg') }}"
                    data-caption="LUIS ARMANDO SALAS SUBIA">
                    <img loading="lazy"
                        class="z-30 absolute left-1/2 transform -translate-x-1/2 top-0 h-64 md:h-auto w-96 lg:w-6/12 object-cover object-left-top rounded-lg border-2 border-verde"
                        src="{{ asset('imagenes/convenio/luis_salas.jpeg') }}" alt="LUIS ARMANDO SALAS SUBIA">
                </a>
            </div>-->
        </div>
    </section>
    <section class="relative pb-0 md:pb-28 mt-0 md:mt-16">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 p-6">

            <div class="flex flex-col justify-center order-2 md:order-1 convenio-1 relative">
                <header class="text-verde text-xl font-semibold uppercase text-left">Convenio</header>
                <h2 class="text-3xl font-bold py-2 text-left">CONVENIO ESPECÍFICO DE COOPERACIÓN
ACADÉMICA ENTRE EL INSTITUTO SUPERIOR
TECNOLÓGICO CUMANDÁ Y LA FUNDACIÓN
CRISTIANA DE INVESTIGACIÓN Y DESARROLLO
INTEGRAL</h2>
                <p class="text-neutral-700 py-2 text-lg text-left">
                    Convenio Semila: El Instituto Superior Tecnológico Cumandá y la Fundación Cristiana de Investigación y Desarrollo Integral suscriben un convenio específico de cooperación académica que establece una alianza estratégica orientada a la articulación de la formación teológica y pastoral con programas de educación superior tecnológica, permitiendo a los estudiantes acceder a un título de tercer nivel en Acción Pastoral con reconocimiento oficial.
                    <br><br>
Mediante este acuerdo, ambas instituciones se comprometen a coordinar procesos de fortalecimiento académico e integración formativa, garantizando la calidad, validez y pertinencia de los procesos educativos, así como la continuidad académica y el desarrollo profesional de los estudiantes conforme a la normativa vigente. </p>
                <div class="flex items-center space-x-4 mt-4">
                    <button href="{{ asset('documentos/convenios/convenio_fcidi_1.pdf') }}" data-fancybox
                        data-caption="Documento del Convenio" data-type="pdf"
                        class="border-2 border-verde text-verde px-4 py-2 rounded-full text-sm font-semibold">VER CONVENIO</button>
                </div>
            </div>

            <!--<div class="relative h-72 md:h-auto convenio-2 flex justify-center items-center order-1 md:order-2">
                <a class="" href="{{ asset('imagenes/convenio/luis_salas.jpeg') }}"
                    data-caption="LUIS ARMANDO SALAS SUBIA">
                    <img loading="lazy"
                        class="z-30 absolute left-1/2 transform -translate-x-1/2 top-0 h-64 md:h-auto w-96 lg:w-6/12 object-cover object-left-top rounded-lg border-2 border-verde"
                        src="{{ asset('imagenes/convenio/luis_salas.jpeg') }}" alt="LUIS ARMANDO SALAS SUBIA">
                </a>
            </div>-->
        </div>
    </section>
    <!--<section class="relative pb-0 md:pb-28 mt-0 md:mt-16">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 p-6">

            <div class="flex flex-col justify-center order-2 md:order-1 convenio-1 relative">
                <header class="text-verde text-xl font-semibold uppercase text-left">Convenio</header>
                <h2 class="text-3xl font-bold py-2 text-left">CONVENIO ACADÉMICO ENTRE EL INSTITUTO SUPERIOR
TECNOLÓGICO CUMANDÁ Y EL SEÑOR LUIS ARMANDO SALAS SUBIA</h2>
                <p class="text-neutral-700 py-2 text-lg text-left">
                    Convenio Luis Armando Salas Subia: El Instituto Superior Tecnológico Cumandá y el señor Luis Armando Salas Subia suscriben un convenio académico que establece una alianza estratégica orientada a la promoción y difusión de la oferta educativa institucional en la ciudad de Ibarra, conforme a los lineamientos establecidos por el Instituto y la normativa vigente.
                    <br><br>
Mediante este acuerdo, ambas partes se comprometen a articular acciones para garantizar una adecuada socialización de los programas académicos, asegurando la veracidad de la información, el cumplimiento de las directrices institucionales y el fortalecimiento del acceso a la educación superior tecnológica con calidad y pertinencia.</p>
                <div class="flex items-center space-x-4 mt-4">
                    <button href="{{ asset('documentos/convenios/convenio_lass_1.pdf') }}" data-fancybox
                        data-caption="Documento del Convenio" data-type="pdf"
                        class="border-2 border-verde text-verde px-4 py-2 rounded-full text-sm font-semibold">VER CONVENIO</button>
                </div>
            </div>

        </div>
    </section>-->
    <section class="pb-16 bg-gray-100">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
            <!-- Texto y descripción -->
            <div class="flex flex-col justify-center order-2 md:order-1 convenio-1">
                <header class="text-verde text-xl font-semibold uppercase text-left">Convenio</header>
                <h2 class="text-3xl font-bold py-2 text-left">BIOHACK UIO</h2>
                <p class="text-neutral-700 py-2 text-lg text-left">
                    Gracias al convenio con Biohack UIO, los estudiantes del ISTCumandá podrán acceder a practicas
                    profesionales teniendo un aprendizaje real y de primera. Biohack UIO es un laboratorio de
                    biotecnología que busca fomentar la innovación y el emprendimiento en el país.
                </p>
                <div class="flex items-center space-x-4 mt-4">
                    <a href="https://biohackuio.com" target="_blank"
                        class="bg-verde text-neutral-100 px-4 py-2 rounded-full text-sm font-semibold">IR A
                        BIOHACK UIO</a>
                    {{-- <a href="{{ asset('imagenes/convenio/documento_convenio.webp') }}" data-fancybox
                        data-caption="Documento del Convenio"
                        class="border-2 border-verde text-verde px-4 py-2 rounded-full text-sm font-semibold">CONVENIO</a> --}}
                </div>
            </div>

            <!-- Imágenes -->
            <div class="order-1 md:order-2 convenio-2 flex justify-center items-center">
                <a class="" href="{{ asset('imagenes/convenio/PCR.webp') }}" data-fancybox="gallery-2"
                    data-caption="BIOHACK UIO">
                    <img loading="lazy" class="h-64 object-cover object-center rounded-lg border-2 border-verde"
                        src="{{ asset('imagenes/convenio/PCR.webp') }}" alt="imagen 1">
                </a>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
        <script>
            Fancybox.bind("[data-fancybox]", {
                left: ["infobar"],
                middle: [],
                right: [
                    "iterateZoom",
                    "slideshow",
                    "fullscreen",
                    "thumbs",
                    "close",
                ],
            });
        </script>
    @endpush
</x-app-layout>
