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

    <section class="relative pb-0 md:pb-28 mb-16 mt-0 md:mt-16">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
            <!-- Texto y descripción -->
            <div class="flex flex-col justify-center order-2 md:order-1 convenio-1">
                <header class="text-verde text-xl font-semibold uppercase text-left">Convenio</header>
                <h2 class="text-3xl font-bold py-2 text-left">Centro de Formación Parmentier</h2>
                <p class="text-neutral-700 py-2 text-lg text-left">
                    Gracias al convenio bilateral los participantes que se capaciten en las diversas ofertas de la
                    formación Parmentier, tendrán el aval de los módulos académicos por parte del IST Cumandá. La
                    finalidad es facilitar el crecimiento académico, educativo y de emprendimiento de nuestro país, en
                    las áreas técnicas, tecnológicas y de educación continua del ámbito gastronómico, hotelero y
                    turístico.
                </p>
                <div class="flex items-center space-x-4 mt-4">
                    <a href="https://www.parmentierformacion.com/" target="_blank"
                        class="bg-verde text-neutral-100 px-4 py-2 rounded-full text-sm font-semibold">IR A
                        PARMENTIER</a>
                    <a href="{{ asset('imagenes/convenio/documento_convenio.webp') }}" data-fancybox
                        data-caption="Documento del Convenio"
                        class="border-2 border-verde text-verde px-4 py-2 rounded-full text-sm font-semibold">CONVENIO</a>
                </div>
            </div>

            <!-- Imágenes -->
            <div class="relative h-72 md:h-auto order-1 md:order-2 convenio-2">
                <a class="" href="{{ asset('imagenes/convenio/convenio_1.webp') }}" data-fancybox="gallery"
                    data-caption="Convenio entre las dos instituciones">
                    <img loading="lazy"
                        class="z-30 absolute left-1/2 transform -translate-x-1/2 top-0 w-96 h-72 object-cover object-left-top rounded-lg border-2 border-verde"
                        src="{{ asset('imagenes/convenio/convenio_1.webp') }}" alt="imagen 1">
                </a>
                <a class="hidden md:block" href="{{ asset('imagenes/convenio/convenio_2.webp') }}"
                    data-fancybox="gallery" data-caption="Representante de Intituto Superior Técnico Cumandá">
                    <img loading="lazy"
                        class="z-20 absolute right-0 top-1/3 transform translate-y-7 w-48 h-60 object-cover object-left-top rounded-lg border-2 border-verde"
                        src="{{ asset('imagenes/convenio/convenio_2.webp') }}" alt="imagen 2">
                </a>
                <a class="hidden md:block" href="{{ asset('imagenes/convenio/convenio_3.1.webp') }}"
                    data-fancybox="gallery" data-caption="Representante de Parmentier Centro de Formación">
                    <img loading="lazy"
                        class="z-10 absolute right-10 -top-1/3 w-48 h-60 object-cover object-left-top rounded-lg border-2 border-verde"
                        src="{{ asset('imagenes/convenio/convenio_3.1.webp') }}" alt="imagen 3">
                </a>
            </div>
        </div>
    </section>
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
