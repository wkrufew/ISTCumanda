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
        asset('https://images.pexels.com/photos/9572477/pexels-photo-9572477.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'))

    @section('og-tags')
        <meta property="og:url" content="{{ route('convenios') }}">
        <meta property="og:type" content="article">
    @endsection
    {{-- FIN SEO --}}

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    @endpush
    <section id="inicio" class="overflow-hidden rounded-b-xl -mt-20 bg-cover bg-center bg-no-repeat h-56 md:h-72"
        style="background-image: url('https://images.pexels.com/photos/9572477/pexels-photo-9572477.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
        <div class="bg-black/50 p-8 md:p-12 lg:px-16 lg:py-32 h-full">
            <div class="max-w-4xl mx-auto flex justify-center h-full items-center">
                <h1 class="text-lg font-semibold text-white sm:text-xl md:text-3xl mt-10 md:mt-0 uppercase text-center">
                    {{ __(' "Accede al conocimiento sin límites, donde y cuando lo necesites" ') }}
                </h1>
            </div>
        </div>
    </section>

    <div class="mt-10 md:pb-6">
        <div class="max-w-5xl mx-auto px-8 sm:px-6 lg:px-10 text-gray-600 md:px-12 xl:px-6">
            <div class="space-y-0 md:flex md:gap-6 lg:items-center justify-center lg:gap-12">
                <div class="md:w-5/12 lg:w-5/12 h-64 md:h-72">
                    <img class="rounded-lg"
                        src="https://images.pexels.com/photos/6334763/pexels-photo-6334763.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="image" loading="lazy" width="" height="">
                </div>
                <div class="md:w-7/12 lg:w-6/12 h-48 md:h-72 flex flex-col items-center justify-center">
                    <h2 class="text-lg text-gray-900 font-semibold md:text-4xl">
                        {{ __('BIBLIOTECAS VIRTUALES') }}
                    </h2>
                    <p class="mt-3 md:mt-6 text-gray-600 text-center">
                        {{-- UN TEXTO SOBRE ESTA AREA QUE SERA PARA AREAS VIRTUALES --}}
                        Las bibliotecas virtuales son espacios en línea que ofrecen acceso a una amplia variedad de
                        recursos de información, como libros electrónicos, revistas, periódicos, bases de datos, entre
                        otros. Estos recursos pueden ser consultados desde cualquier lugar y en cualquier momento, lo
                        que facilita el acceso a la información y el aprendizaje.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section id="lista-bibliotecas" class="py-12 bg-gray-50 mb-10 mt-6">
        <div class="max-w-5xl mx-auto px-6 sm:px-12 lg:px-16">
            <h3 class="text-lg md:text-3xl font-bold text-gray-800 text-center mb-8 uppercase">
                {{ __('Lista de Bibliotecas Virtuales') }}
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                <!-- Biblioteca FAO -->
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img class="h-48 w-full object-cover object-left-top" src="{{ asset('imagenes/FAO.png') }}"
                        alt="Biblioteca FAO">
                    <div class="p-6">
                        <h4 class="text-xl font-semibold text-gray-800">{{ __('Biblioteca FAO') }}</h4>
                        <p class="mt-3 text-gray-600">
                            Biblioteca virtual de la FAO que ofrece recursos informativos y científicos relacionados con
                            la agricultura, alimentación y desarrollo rural.
                        </p>
                        <div class="flex justify-center items-center">
                            <a href="https://www.fao.org/library/es/" target="_blank"
                                class="inline-block mt-4 px-4 py-2 text-sm font-medium text-white bg-verde rounded-full hover:bg-verde">
                                {{ __('Visitar Biblioteca') }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Biblioteca SIDALC -->
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img class="h-48 w-full object-cover object-left-top" src="{{ asset('imagenes/SIDALIC.png') }}"
                        alt="Biblioteca SIDALC">
                    <div class="p-6">
                        <h4 class="text-xl font-semibold text-gray-800">{{ __('Biblioteca SIDALC') }}</h4>
                        <p class="mt-3 text-gray-600">
                            Red de información y documentación agrícola que conecta bibliotecas en América Latina y el
                            Caribe con recursos valiosos.
                        </p>
                        {{-- <a href="http://www.sidalc.net/" target="_blank"
                            class="inline-block mt-4 px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded hover:bg-indigo-700">
                            {{ __('Visitar Biblioteca') }}
                        </a> --}}
                        <div class="flex justify-center items-center">
                            <a href="http://www.sidalc.net/" target="_blank"
                                class="inline-block mt-4 px-4 py-2 text-sm font-medium text-white bg-verde rounded-full hover:bg-verde">
                                {{ __('Visitar Biblioteca') }}
                            </a>
                        </div>
                    </div>
                </div>
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
