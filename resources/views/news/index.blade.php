<x-app-layout>
    @section('title', '- Noticias e Información')
    @section('description', 'Mantente informado con las últimas noticias, eventos y novedades del Instituto Superior Tecnológico Cumandá. Publicaciones sobre logros académicos, actividades institucionales y oportunidades de formación.')
    @section('keywords', 'noticias IST Cumandá, novedades institucionales, eventos académicos, actividades ISTC, publicaciones Instituto Superior Tecnológico Cumandá, noticias educación Chimborazo')
    @section('url', route('news.index'))
    @section('img', asset('imagenes/portada_pro.webp'))

    @section('og-tags')
        <meta property="og:url" content="{{ route('news.index') }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Noticias — IST Cumandá">
    @endsection

    @livewire('post-news')

</x-app-layout>
