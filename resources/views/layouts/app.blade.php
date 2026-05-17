<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#32620e" />

    <!-- SEO Dinámico -->
    <title>{{ $settings->site_name }} @yield('title')</title>
    <link rel="canonical" href="@yield('url', config('app.url'))">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Jose Coba">
    <meta name="description" content="@yield('description', 'Obtén una educación de calidad en ISTCumandá para un futuro lleno de oportunidades.')">
    <meta name="keywords" content="@yield('keywords', 'educación, ISTCumanda, futuro, oportunidades, calidad educativa')">

    <!-- Open Graph data -->
    <meta property="og:type" content="@yield('type', 'website')">
    <meta property="og:title" content="{{ $settings->site_name }} @yield('title', 'Inicio')">
    <meta property="og:description" content="@yield('description', 'Obtén una educación de calidad en ISTCumandá para un futuro lleno de oportunidades.')">
    <meta property="og:url" content="@yield('url', config('app.url'))">
    <meta property="og:image" content="@yield('img', asset('imagenes/logo_pro.webp'))">
    <meta property="og:image:width" content="450">
    <meta property="og:image:height" content="450">
    <meta property="og:site_name" content="{{ $settings->site_name }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $settings->site_name }} @yield('title', 'Inicio')">
    <meta name="twitter:description" content="@yield('description', 'Obtén una educación de calidad en ISTCumandá para un futuro lleno de oportunidades.')">
    <meta name="twitter:image" content="@yield('img', asset('imagenes/logo_pro.webp'))">
    <meta name="twitter:site" content="@ISTCumanda">
    <meta name="twitter:creator" content="@ISTCumanda">

    @yield('og-tags') <!-- Etiquetas Open Graph adicionales si es necesario -->

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('imagenes/icono.webp') }}" type="image/webp">
    <link rel="apple-touch-icon" href="{{ asset('imagenes/icono.webp') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    {{-- <link href="https://fonts.bunny.net/css?family=abel:400|ubuntu:300,400,500,700" rel="stylesheet" /> --}}

    <link href="https://fonts.bunny.net/css?family=league-spartan:100,300,500,700,900" rel="stylesheet" />

    @stack('css')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://unpkg.com/scrollreveal" defer></script>
    <script src="https://kit.fontawesome.com/a501d340ea.js" crossorigin="anonymous" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

    <!-- Styles -->
    @livewireStyles

    <!-- GOOGLE CONSOLE VERIFICACION -->
    <meta name="google-site-verification" content="heFoUMvNRdzTnVOrOlA_kJ1r9pJhFS66vCu3O_skMaE" />
</head>

<body class="font-league-spartan antialiased">
    <x-banner />

    <div class="min-h-screen bg-white">
        <a href="#inicio"
            class="scrollTop p-1 transform rotate-180 fixed right-5 md:right-10 w-10 h-10 bg-verdeclaro/80 hover:bg-verde/80 shadow-2xl rounded-full cursor-pointer z-30 opacity-0">
            <svg class=" z-30 w-full h-full mx-auto text-white cursor-pointer" fill="#FFFFFF" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </a>
        {{-- Barra Verde --}}
        {{-- <x-header-datos /> --}}

        {{-- Menu --}}
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <x-footer />
    </div>

    @stack('modals')
    @stack('scripts')
    @stack('js')

    @livewireScripts

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('alert', (eventData) => {
                const data = eventData[0];
                Swal.fire({
                    icon: data.type,
                    title: data.title,
                    text: data.message,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
            });
        });
    </script>
</body>
{{--
 document.addEventListener('livewire:init', function() {
            @if (session('alert'))
                let alertData = @json(session('alert'));

                Swal.fire({
                    icon: alertData.type,
                    title: alertData.title,
                    text: alertData.message,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
            @endif
        });
--}}

</html>
