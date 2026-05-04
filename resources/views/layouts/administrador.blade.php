<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#BBD12C" />
    <!-- SEO -->
    <meta name="robots" content="index, follow">
    <meta name="description"
        content="Obtén una educación de calidad en ISTCumandá para un futuro lleno de oportunidades.">
    <meta name="keywords" content="educación, ISTCumanda, futuro, oportunidades, calidad educativa">
    <meta name="author" content="ISTCumanda">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ config('app.url', 'ISTCumanda') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('imagenes/IST_LOGO.webp') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=abel:400|ubuntu:300,400,500,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/a501d340ea.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Styles -->
    @livewireStyles
    @stack('css')

</head>

<body class="bg-gray-100" x-data="{ open: false }" :class="{
    'overflow-hidden': open,
}">
    @include('layouts.includes.administrador.navigation')

    @include('layouts.includes.administrador.sidebar')

    <div class="ml-64">
        <div class="w-auto mx-auto p-2 rounded-lg mt-16">
            <div class="grid grid-cols-5 gap-4 w-full mx-auto">
                @if (isset($course))
                    <div class="">
                        <div class="sticky top-24">
                            <ul class="text-md bg-white text-gray-600 rounded-lg shadow-md p-2">
                                <li
                                    class="mt-1 leading-7 mb-1 border-l-4 pl-2 hover:bg-green-500 hover:text-gray-50 {{ request()->routeIs('administrador.courses.edit', $course) ? 'border-green-500' : 'border-transparent' }}">
                                    <a href="{{ route('administrador.courses.edit', $course) }}"> Informacion del
                                        plan</a>
                                </li>
                                <hr>
                                <li
                                    class="leading-7 mb-1 border-l-4  pl-2 hover:bg-green-500 hover:text-gray-50 {{ request()->routeIs('administrador.courses.goals', $course) ? 'border-green-500' : 'border-transparent' }}">
                                    <a href="{{ route('administrador.courses.goals', $course) }}">Metas del curso</a>
                                </li>
                                <hr>
                                <li
                                    class="leading-7 mb-1 border-l-4  pl-2 hover:bg-green-500 hover:text-gray-50 {{ request()->routeIs('administrador.courses.requirements', $course) ? 'border-green-500' : 'border-transparent' }}">
                                    <a href="{{ route('administrador.courses.requirements', $course) }}">Requerimientos
                                        del curso</a>
                                </li>
                                <hr>
                                <li
                                    class="leading-7 mb-1 border-l-4  pl-2 hover:bg-green-500 hover:text-gray-50 {{ request()->routeIs('administrador.courses.audiences', $course) ? 'border-green-500' : 'border-transparent' }}">
                                    <a href="{{ route('administrador.courses.audiences', $course) }}">Audiencias del
                                        curso</a>
                                </li>
                                <hr>
                                <li
                                    class="leading-7 mb-1 border-l-4  pl-2 hover:bg-green-500 hover:text-gray-50 {{ request()->routeIs('administrador.courses.advantages', $course) ? 'border-green-500' : 'border-transparent' }}">
                                    <a href="{{ route('administrador.courses.advantages', $course) }}">Ventajas del
                                        curso</a>
                                </li>
                                {{-- <li
                                    class="leading-7 mb-1 border-l-4  pl-2 hover:bg-green-500 hover:text-gray-50 {{ request()->routeIs('administrador.courses.teachers', $course) ? 'border-green-500' : 'border-transparent' }}">
                                    <a href="{{ route('administrador.courses.teachers', $course) }}">Profesores del
                                        curso</a>
                                </li> --}}
                                <hr>
                                <li
                                    class="leading-7 border-l-4 border-transparent  pl-2 hover:bg-green-500 hover:text-gray-50 ">
                                    <a href="{{ route('administrador.courses.index') }}">Volver al listado de
                                        cursos</a>
                                </li>
                            </ul>

                            <div class="bg-white mt-4 rounded-lg p-4 shadow-md">
                                @switch($course->status)
                                    @case(1)
                                        <div class="flex justify-center">
                                            <form class="mx-5" action="{{ route('administrador.courses.status', $course) }}"
                                                method="POST">
                                                @csrf
                                                <button class="bg-red-600 text-white px-3 py-2 rounded-full"
                                                    type="submit">Publicar Curso</button>
                                            </form>
                                        </div>
                                    @break

                                    @case(2)
                                        <div class="text-center  bg-green-600 text-gray-50 rounded-full px-3 py-2">
                                            <p class="font-bold text-center">Curso publicado</p>
                                        </div>
                                    @break

                                    @default
                                @endswitch
                            </div>
                        </div>
                    </div>
                @endif
                <div class="{{-- @if (isset($course)) col-span-4 @else col-span-5 @endif --}} {{ isset($course) ? 'col-span-4' : 'col-span-5' }}">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    <div x-cloak x-on:click="open = false" x-show="open"
        class="bg-gray-900 bg-opacity-50 fixed inset-0 z-30 sm:hidden"></div>

    @stack('modals')

    @livewireScripts

    @stack('js')
    @isset($js)
        {{ $js }}
    @endisset

</body>

</html>
