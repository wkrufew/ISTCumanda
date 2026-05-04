<x-app-layout>
    {{-- INICIO SEO --}}
    @section('title', '- Acerca de Nosotros')
    @section('description',
        'Conoce más sobre ' .
        ($settings->site_name ?? 'ISTCumanda') .
        ' y nuestra misión de ofrecer
        una educación de calidad a nuestros estudiantes.')
    @section('keywords',
        'acerca de nosotros, educación, ' .
        ($settings->site_name ?? 'ISTCumanda') .
        ', misión, visión,
        calidad educativa')
    @section('url', route('about'))
    @section('img',
        asset('https://images.pexels.com/photos/7070/space-desk-workspace-coworking.jpg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'))

    @section('og-tags')
        <meta property="og:url" content="{{ route('about') }}">
        <meta property="og:type" content="article">
    @endsection

    {{-- FIN DEL SEO --}}



    <section id="inicio" class="overflow-hidden rounded-b-xl -mt-20 bg-cover bg-center bg-no-repeat h-56 md:h-72"
        style="background-image: url('https://images.pexels.com/photos/3184357/pexels-photo-3184357.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
        <div class="bg-black/50 p-8 md:p-12 lg:px-16 lg:py-32 h-full">
            <div class="max-w-4xl mx-auto flex justify-center h-full items-center">
                <h1 class="text-2xl font-bold text-white sm:text-3xl md:text-5xl mt-10 md:mt-0">{{ __('Quienes Somos') }}
                </h1>
            </div>
        </div>
    </section>

    <div class="mt-10 md:pb-6">
        <div class="max-w-5xl mx-auto px-8 sm:px-6 lg:px-10 text-gray-600 md:px-12 xl:px-6">
            <div class="space-y-0 md:space-y-0 md:flex md:gap-6 lg:items-center justify-center lg:gap-12">
                <div class="md:5/12 lg:w-5/12  rounded-xl overflow-hidden">
                    <img src="https://images.pexels.com/photos/3184418/pexels-photo-3184418.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                        alt="image" loading="lazy" width="" height="">
                </div>
                <div class="md:7/12 lg:w-6/12 h-56 md:h-72 flex flex-col items-center justify-center">
                    <h2 class="text-2xl text-gray-900 font-semibold md:text-4xl">{{ __('Nuestro Lema "ISTCumandá"') }}
                    </h2>
                    <p class="mt-6 text-gray-600 text-center">
                        Dedicado completamente a nuestros alumnos con ganas de aprender y superarse además de velar
                        porque cumplan su meta propuesta y alcancen la excelencia.
                    </p>
                    {{-- <p class="mt-4 text-gray-600"> Nobis minus voluptatibus pariatur dignissimos libero quaerat iure
                        expedita at? Asperiores nemo possimus nesciunt dicta veniam aspernatur quam mollitia.</p> --}}
                </div>
            </div>
        </div>
    </div>

    <section class="relative pb-28 mb-16 mt-16">

        <div
            class="max-w-5xl mx-auto px-6 sm:px-4 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:py-4">
            <div class="transition duration-300 ease transform hover:translate-y-1 hover:scale-105">
                <article
                    class="card1 cursor-pointer altura w-full z-0 relative overflow-hidden rounded-lg bg-verde shadow-lg shadow-verde/50">
                    <div class="absolute h-full w-full">
                        <img loading="lazy" src="{{ asset('imagenes/Filosofia.jpeg') }}" alt="ISTCumandaLema"
                            class="object-cover w-full h-full ">
                    </div>
                </article>
            </div>
            <div class="transition duration-300 ease transform hover:translate-y-1 hover:scale-105">
                <article
                    class="card1 cursor-pointer altura w-full z-0 relative overflow-hidden rounded-lg bg-verde shadow-lg shadow-verde/50">
                    <div class="absolute h-full w-full">
                        <img loading="lazy" src="{{ asset('imagenes/Mision.jpeg') }}" alt="Mision"
                            class="object-cover w-full h-full ">
                    </div>
                </article>
            </div>
            <div class="transition duration-300 ease transform hover:translate-y-1 hover:scale-105">
                <article
                    class="card1 cursor-pointer altura w-full z-0 relative overflow-hidden rounded-lg bg-verde shadow-lg shadow-verde/50">
                    <div class="absolute h-full w-full">
                        <img loading="lazy" src="{{ asset('imagenes/Vision.jpeg') }}" alt="Vision"
                            class="object-cover w-full h-full ">
                    </div>
                </article>
            </div>
        </div>
    </section>
</x-app-layout>
