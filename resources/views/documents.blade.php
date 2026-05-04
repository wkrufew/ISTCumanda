<x-app-layout>
    @section('title', '- DOCUMENTACIÓN')
    @section('description',
        'Explora los documentos legales que ' .
        ($settings->site_name ?? 'ISTCumanda') .
        ' dispone
        para ofrecerte una educación de calidad.')
    @section('keywords',
        'convenios, educación, ' .
        ($settings->site_name ?? 'ISTCumanda') .
        ', instituciones,
        oportunidades')
    @section('url', route('convenios'))
    @section('img',
        asset('https://media.istockphoto.com/id/1902034840/photo/electronic-document-management-system-concept-searching-and-business-managing-files-online.jpg?s=2048x2048&w=is&k=20&c=oUFUZ7B3ecPate-IU-A_oDFxwg4oGqmVzshBylMCY0I='))

    @section('og-tags')
        <meta property="og:url" content="{{ route('convenios') }}">
        <meta property="og:type" content="article">
    @endsection
    {{-- FIN SEO --}}

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    @endpush
    <section id="inicio" class="overflow-hidden rounded-b-xl -mt-20 bg-cover bg-center bg-no-repeat h-56 md:h-72"
        style="background-image: url('https://media.istockphoto.com/id/1902034840/photo/electronic-document-management-system-concept-searching-and-business-managing-files-online.jpg?s=2048x2048&w=is&k=20&c=oUFUZ7B3ecPate-IU-A_oDFxwg4oGqmVzshBylMCY0I=');">
        <div class="bg-black/50 p-8 md:p-12 lg:px-16 lg:py-32 h-full">
            <div class="max-w-4xl mx-auto flex justify-center h-full items-center">
                <h1 class="text-lg font-bold text-white sm:text-2xl md:text-3xl mt-10 md:mt-0 text-center uppercase">
                    {{ __(' "Documentación legal del ISTC" ') }}
                </h1>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 md:px-8 lg:px-16 mb-16">
        @livewire('document-viewer')
    </div>
</x-app-layout>
