<x-app-layout>
    @section('title', '| ' . $course->title)
    @section('description', Str::limit($course->description, 160))
    @section('keywords', 'educación, cursos, ' . $course->category->name . ', ' . $course->title)
    @section('url', route('course.show', $course))
    @section('img', $course->image ? Storage::url($course->image->url) : asset('imagenes/IST_LOGO.webp'))

    @section('og-tags')
        <meta property="og:url" content="{{ route('course.show', $course) }}">
        <meta property="og:type" content="article">
    @endsection
    @push('css')
    @endpush
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <div id="inicio" class="mb-20">
        <style>
            .fondo {
                background-color: #7ea41e;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='0' x2='0' y1='0' y2='100%25' gradientTransform='rotate(240)'%3E%3Cstop offset='0' stop-color='%237ea41e'/%3E%3Cstop offset='1' stop-color='%23000000'/%3E%3C/linearGradient%3E%3Cpattern patternUnits='userSpaceOnUse' id='b' width='540' height='450' x='0' y='0' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='0.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect x='0' y='0' fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect x='0' y='0' fill='url(%23b)' width='100%25' height='100%25'/%3E%3C/svg%3E");
                background-attachment: fixed;
                background-size: cover;
            }

            .tarjeta-carrito {
                bottom: -200px;
                /* z-index: 9999; */
                visibility: hidden;
                transition: 1s;
            }

            /* poner el active solo para dispositivos pequeños */
            @media (max-width: 768px) {
                .tarjeta-carrito.active {
                    bottom: 0px;
                    visibility: visible;
                    opacity: 1;
                }
            }
        </style>
        <div class="fondo -mt-20 pt-20 md:pt-28 pb-6 md:pb-10 rounded-b-2xl">
            <div class="max-w-6xl mx-auto px-0 md:px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <img class="w-full h-80 object-cover rounded-b-3xl md:rounded-b-none  md:rounded-bl-3xl md:rounded-tr-3xl"
                            src="{{ Storage::url($course->image->url) }}" alt="{{ $course->title }}">
                    </div>
                    <div class="p-2 md:p-4 h-80 text-gray-100 flex flex-col justify-center space-y-3">
                        <h1 class="text-xl font-semibold uppercase pb-1">
                            {{ $course->title }}
                        </h1>
                        @isset($course->approval_date)
                            <p class="flex items-center">
                                <span>
                                    <svg class="fill-gray-50 size-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                    </svg>
                                </span>
                                <span class="font-semibold ml-1 mr-2">Aprobación: </span>
                                <span>
                                    {{ $course->approval_date->isoFormat('D [de] MMMM [de] Y') }}
                                </span>

                            </p>
                        @endisset
                        <div class="flex space-x-2">
                            <p class="flex items-center">
                                <span>
                                    <svg class="fill-gray-50 size-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                    </svg>
                                </span>
                                <span class="font-semibold ml-1 mr-2">Modalidad: </span>
                                <span>
                                    {{ $course->modality }}
                                </span>
                            </p>
                            <p class="flex items-center">
                                <svg class="fill-gray-50 size-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg>
                                <span class="font-semibold ml-1 mr-2">Duración: </span>
                                <span>
                                    {{ $course->duration }}
                                </span>
                            </p>
                        </div>
                        <p class="flex items-center">
                            <svg class="fill-gray-50 size-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path
                                    d="M320 96L192 96 144.6 24.9C137.5 14.2 145.1 0 157.9 0L354.1 0c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128l128 0c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96L96 512c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4c0 0 0 0 0 0s0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20l0 14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1c0 0 0 0 0 0s0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4l0 14.6c0 11 9 20 20 20s20-9 20-20l0-13.8c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15c0 0 0 0 0 0l-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7l0-13.9z" />
                            </svg>
                            <span class="font-semibold ml-1 mr-2">Costo de Carrera: </span>
                            <span>
                                ${{ $course->total_investment }}
                            </span>
                        </p>
                        @if($course->investment_per_cycle)
                            <p class="flex items-center">
                                <svg class="fill-gray-50 size-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 384 512">
                                    <path
                                        d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM64 80c0-8.8 7.2-16 16-16l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 96c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16zm128 72c8.8 0 16 7.2 16 16l0 17.3c8.5 1.2 16.7 3.1 24.1 5.1c8.5 2.3 13.6 11 11.3 19.6s-11 13.6-19.6 11.3c-11.1-3-22-5.2-32.1-5.3c-8.4-.1-17.4 1.8-23.6 5.5c-5.7 3.4-8.1 7.3-8.1 12.8c0 3.7 1.3 6.5 7.3 10.1c6.9 4.1 16.6 7.1 29.2 10.9l.5 .1s0 0 0 0s0 0 0 0c11.3 3.4 25.3 7.6 36.3 14.6c12.1 7.6 22.4 19.7 22.7 38.2c.3 19.3-9.6 33.3-22.9 41.6c-7.7 4.8-16.4 7.6-25.1 9.1l0 17.1c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-17.8c-11.2-2.1-21.7-5.7-30.9-8.9c0 0 0 0 0 0c-2.1-.7-4.2-1.4-6.2-2.1c-8.4-2.8-12.9-11.9-10.1-20.2s11.9-12.9 20.2-10.1c2.5 .8 4.8 1.6 7.1 2.4c0 0 0 0 0 0s0 0 0 0s0 0 0 0c13.6 4.6 24.6 8.4 36.3 8.7c9.1 .3 17.9-1.7 23.7-5.3c5.1-3.2 7.9-7.3 7.8-14c-.1-4.6-1.8-7.8-7.7-11.6c-6.8-4.3-16.5-7.4-29-11.2l-1.6-.5s0 0 0 0c-11-3.3-24.3-7.3-34.8-13.7c-12-7.2-22.6-18.9-22.7-37.3c-.1-19.4 10.8-32.8 23.8-40.5c7.5-4.4 15.8-7.2 24.1-8.7l0-17.3c0-8.8 7.2-16 16-16z" />
                                </svg>
                                <span class="font-semibold ml-1 mr-2">Matrícula: </span>
                                <span>
                                    ${{ $course->investment_per_cycle }}
                                </span>
                            </p>
                        @endif

                        {{-- <p class="flex items-center">
                            <span>
                                <svg class="fill-gray-50 size-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                </svg>
                            </span>
                            <span class="font-semibold ml-1 mr-3">Inicio de clases: </span>
                            <span>
                                {{ $course->period->fecha_inicio->isoFormat('D [de] MMMM [de] Y') }}
                            </span>
                        </p>
                        <p class="flex items-center">
                            <span>
                                <svg class="fill-gray-50 size-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                </svg>
                            </span>
                            <span class="font-semibold ml-1 mr-3">Finalizacion de clases: </span>
                            <span>
                                {{ $course->period->fecha_fin->isoFormat('D [de] MMMM [de] Y') }}
                            </span>
                        </p>
                        <p class="flex items-center">
                            <span>
                                <svg class="fill-gray-50 size-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 640 512">
                                    <path
                                        d="M128 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm32 97.3c28.3-12.3 48-40.5 48-73.3c0-44.2-35.8-80-80-80S48 51.8 48 96c0 32.8 19.7 61 48 73.3L96 224l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l256 0 0 54.7c-28.3 12.3-48 40.5-48 73.3c0 44.2 35.8 80 80 80s80-35.8 80-80c0-32.8-19.7-61-48-73.3l0-54.7 256 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0 0-54.7c28.3-12.3 48-40.5 48-73.3c0-44.2-35.8-80-80-80s-80 35.8-80 80c0 32.8 19.7 61 48 73.3l0 54.7-320 0 0-54.7zM488 96a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zM320 392a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                                </svg>
                            </span>
                            <span class="ml-1 mr-3"><span class="font-semibold ">Pre Insciprcipón: </span>
                                <span>Del {{ $course->period->registration_start_date->isoFormat('D [de] MMM') }}
                                    al
                                    {{ $course->period->registration_end_date->isoFormat('D [de] MMM [del] Y') }}</span>
                        </p> --}}
                        <p class="flex items-center">
                            <span>
                                <svg class="fill-gray-50 size-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z" />
                                </svg>
                            </span>
                            <span class="font-semibold ml-1 mr-2">Categoria: </span>
                            <span class="">
                                {{ $course->category->name }}
                            </span>
                        </p>
                        @if($course->url || $course->url2)
                            <div class="flex items-center space-x-5">
                                @if ($course->url)
                                    <a download href="{{ $course->url }}" target="_blank"
                                        class="bg-naranja text-white rounded-full px-3 py-1 flex items-center space-x-2">
                                        <svg class="size-4 fill-gray-50" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                                    </svg>
                                        <span class="text-sm">Malla Curricular</span>
                                    </a>
                                @endif
                                @if  ($course->url2)
                                <a download href="{{ $course->url2 }}" target="_blank"
                                        class="bg-naranja text-white rounded-full px-3 py-1 flex items-center space-x-2">
                                        <svg class="size-4 fill-gray-50" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                                    </svg>
                                        <span class="text-sm">Brochure</span>
                                    </a>
                                @endif
                            </div>
                        @endif
                        <p class="flex items-center font-medium text-gray-100 rounded-full">
                            <span class="bg-verde md:bg-verdeclaro px-3 py-2 rounded-full flex items-center space-x-2">
                                <svg class="size-6 fill-gray-50" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 384 512">
                                    <path
                                        d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z" />
                                </svg>
                                @if ($course->category->id == 1)
                                    <span>Formación de tercer nivel</span>
                                @elseif ($course->category->id == 4)
                                    <span>Formación técnica</span>
                                @elseif ($course->category->id == 5)
                                    <span>Formación Contínua</span>
                                @endif
                            </span>
                        </p>
                        {{-- <p class="flex items-center font-medium text-gray-100 rounded-full">
                            <span class="bg-yellow-600 px-3 py-2 rounded-full flex items-center space-x-2">
                                <svg class="size-6 fill-gray-50" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                </svg>
                                <span>{{ $course->category->name }} en proceso de aprobación</span>
                            </span>
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>
        <style>
            .swiper {
                width: auto;
                height: 190px;
                padding-bottom: 8px;
            }

            .swiper-slide {
                text-align: center;
                /* font-size: 18px; */
                /* background: #fff; */
                display: flex;
                /* justify-content: center; */
                align-items: center;
            }

            /* .swiper-pagination-bullet {
                margin-top: 30px !important;

            }

            .swiper-pagination-bullet-active {
                color: #fff;
                background: #7ea41e;
            } */
        </style>

        <div class="max-w-6xl mx-3 md:mx-auto pt-6">
            <div class="grid grid-cols-6 gap-4 md:gap-6">
                <div class="col-span-6 md:col-span-4">
                    <div class="col-span-6 md:col-span-4 bg-gray-50 rounded-lg p-4 border border-gray-200 shadow-md">
                        <h2 class="font-semibold">OBJETIVO</h2>
                        <h3 class="mt-2">
                            {!! $course->description !!}
                        </h3>
                    </div>
                    @if ($course->advantages->isNotEmpty())
                        <div
                            class="col-span-6 md:col-span-4 bg-verde rounded-lg p-4 border border-gray-200 shadow-md mt-6">
                            <h2 class="font-semibold text-white">VENTAJAS</h2>{{-- <i class="fas fa-wrench text-3xl text-white"></i> --}}
                            <div class="mt-2">
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @foreach ($course->advantages as $ventaja)
                                            <div
                                                class="flex flex-col border border-verdeclaro border-dashed rounded-lg p-2 swiper-slide shadow-md shadow-verdeclaro/50">
                                                <span
                                                    class="bg-verdeclaros border border-white w-20 h-20 rounded-full flex justify-center items-center mx-auto shrink-0 bg-verdeclaro">
                                                    {!! $ventaja->icon !!}
                                                </span>
                                                <p class="mt-2 text-neutral-50 text-sm text-center font-medium">
                                                    {{ $ventaja->name }}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- <div class="swiper-pagination"></div> --}}
                            </div>
                        </div>
                    @endif
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div class="grid gap-6">
                            <div>
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 shadow-md">
                                    <h2 class="font-semibold">LO QUE APRENDERAS</h2>
                                    <ul class="mt-3">
                                        @forelse ($course->goals as $goal)
                                            <li class="space-x-2 flex">
                                                <span>
                                                    <svg class="fill-verde size-4 mt-1.5"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                                    </svg>
                                                </span>
                                                <span>{{ $goal->name }}</span>
                                            </li>
                                        @empty
                                            <li>Sin metas</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="grid gap-6">
                            <div>
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 shadow-md">
                                    <h2 class="font-semibold">PARA QUIEN ES ESTA CARRERA</h2>
                                    <ul class="mt-3">
                                        @forelse ($course->audiences as $audience)
                                            <li class="space-x-2 flex">
                                                <span>
                                                    <svg class="fill-verde size-4 mt-1.5"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                                    </svg>
                                                </span>
                                                <span>{{ $audience->name }}</span>
                                            </li>
                                        @empty
                                            <li>Sin metas</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                            <div>
                                @if($course->requirements->isNotEmpty())
                                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 shadow-md">
                                        <h2 class="font-semibold">REQUISITOS</h2>
                                        <ul class="mt-3">
                                            @forelse ($course->requirements as $requirement)
                                                <li class="space-x-2 flex">
                                                    <span>
                                                        <svg class="fill-verde size-4 mt-1.5"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                                        </svg>
                                                    </span>
                                                    <span>{{ $requirement->name }}</span>
                                                </li>
                                            @empty
                                                <li>Sin metas</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="block md:hidden">
                                @if ($course->teachers->isNotEmpty())
                                    <div class="bg-gray-50 border border-gray-200 rounded-lg shadow-md p-4">
                                        <h2 class="font-semibold pb-3">NUESTROS DOCENTES</h2>
                                        <div class="space-y-3">
                                            <!-- 1 -->
                                            @forelse ($course->teachers as $key => $teacher)
                                                <div x-data="accordion({{ $key + 1 }})"
                                                    class="relative transition-all duration-700 border border-verde rounded-xl shadow-lg overflow-hidden">
                                                    <div @click="handleClick()"
                                                        class="w-full p-4 text-left cursor-pointer bg-white hover:bg-">
                                                        <div class="flex items-center justify-between">
                                                            <div class="flex items-center space-x-2">
                                                                <figure
                                                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                                    @if ($teacher->image)
                                                                        <img class="h-10 w-10 rounded-full object-cover"
                                                                            src="{{ Storage::url($teacher->image->url) }}"
                                                                            alt="{{ $teacher->name }}" />
                                                                    @else
                                                                        <div
                                                                            class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-200 text-verde font-bold text-lg">
                                                                            {{ $teacher->initials }}
                                                                        </div>
                                                                    @endif
                                                                </figure>
                                                                <span class="tracking-wide line-clamp-1">
                                                                    <b>{{ $teacher->name }}</b>
                                                                </span>
                                                            </div>
                                                            <span :class="handleRotate()"
                                                                class="transition-transform duration-500 transform fill-current ">
                                                                <svg class="w-5 h-5 fill-current"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div x-ref="tab" :style="handleToggle()"
                                                        class="relative overflow-hidden transition-all duration-700 max-h-0 bg-gray-100">
                                                        <div class="px-6 py-3 text-gray-700">
                                                            <div class="flex justify-center space-x-5">
                                                                <span>
                                                                    @if ($teacher->email)
                                                                        <a title="correo"
                                                                            href="mailto:{{ $teacher->email }}">
                                                                            <svg class="size-6 fill-cyan-600"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 512 512">
                                                                                <path
                                                                                    d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                                                                            </svg>
                                                                        </a>
                                                                    @endif
                                                                </span>
                                                                <span>
                                                                    @if ($teacher->url)
                                                                        <a title="url" href="">
                                                                            <svg class="size-6 fill-blue-600"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 512 512">
                                                                                <path
                                                                                    d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64zm28.8-64l123.1 0c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64l-123.1 0c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32l-116.7 0c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0l-176.6 0c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0L18.6 160C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192l123.1 0c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64L8.1 320C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6l176.6 0c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352l116.7 0zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6l116.7 0z" />
                                                                            </svg>
                                                                        </a>
                                                                    @endif
                                                                </span>
                                                                <span>
                                                                    @if ($teacher->phone)
                                                                        @php
                                                                            $mensaje = "Hola soy el {$teacher->name} en que puedo ayudarte...";
                                                                            $mensajeReemplazado = str_replace(
                                                                                ' ',
                                                                                '%20',
                                                                                $mensaje,
                                                                            );
                                                                        @endphp
                                                                        <a title="Whatsapp"
                                                                            href="https://api.whatsapp.com/send?phone={{ $teacher->phone }}&text={{ $mensajeReemplazado }}"
                                                                            target="_blank"><i
                                                                                class="fab fa-whatsapp text-[#4dc247] text-2xl cursor-pointer"></i></a>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            @if ($teacher->description)
                                                                <p class="mt-2 text-sm font-medium">
                                                                    {{ $teacher->description }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- <div>
                        <div class="grid grid-cols-2 gap-6 mt-6">
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 shadow-md">
                                <h2 class="font-semibold">LO QUE LOGRARAS</h2>
                                <ul class="mt-3">
                                    @forelse ($course->goals as $goal)
                                        <li class="space-x-2 flex items-center">
                                            <span>
                                                <svg class="fill-verde size-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                                </svg>
                                            </span>
                                            <span>{{ $goal->name }}</span>
                                        </li>
                                    @empty
                                        <li>Sin metas</li>
                                    @endforelse
                                </ul>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 shadow-md">
                                <h2 class="font-semibold">PARA QUIEN ES ESTA CARRERA</h2>
                                <ul class="mt-3">
                                    @forelse ($course->audiences as $audience)
                                        <li class="space-x-2 flex items-center">
                                            <span>
                                                <svg class="fill-verde size-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                                </svg>
                                            </span>
                                            <span>{{ $audience->name }}</span>
                                        </li>
                                    @empty
                                        <li>Sin metas</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-6 mt-6">
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 shadow-md">
                                <h2 class="font-semibold">REQUISITOS</h2>
                                <ul class="mt-3">
                                    @forelse ($course->requirements as $requirement)
                                        <li class="space-x-2 flex items-center">
                                            <span>
                                                <svg class="fill-verde size-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                                </svg>
                                            </span>
                                            <span>{{ $requirement->name }}</span>
                                        </li>
                                    @empty
                                        <li>Sin metas</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
                {{-- BOTON FLOTANTE --}}
                @php
                    $fecha = now()->format('Y-m-d H:i:s'); // con hora

                    $mensaje = "Hola IST Cumandá,\n\n"
                        . "Estoy interesado/a en conocer más sobre la tecnología: *{$course->title}*.\n\n"
                        . "Agradezco su atención y espero recibir más información sobre el proceso de admisión y matrícula. \n\n"
                        . "Fecha de contacto: {$fecha}.";

                    $mensajeCodificado = urlencode($mensaje);
                @endphp
                <div
                    class="tarjeta-carrito md:hidden p-4 fixed z-40 right-0 w-full shadow-xl bg-neutral-900 border-t-2 border-verde rounded-t-3xl">
                    <h2 class="font-semibold text-gray-50">SE PARTE DE LA CARRERA {{ $course->title }}</h2>
                    <p class="text-xs mt-1 text-gray-300"><span class="font-semibold">Nota: </span> Que esperas para
                        formar
                        parte de
                        nuestra institución</p>
                    <div>{{-- {{ route('course.enrolled', $course) }} --}}
                        @if ($course->period && $course->period->isRegistrationOpen())
                            {{-- <a class="block text-center w-full bg-morado hover:bg-morado/80 text-white font-semibold rounded-full px-4 py-2 mt-4"
                                href="{{ route('course.inscripcion', $course) }}">MATRICULATE AHORA</a> --}}

                            <a class="block text-center w-full bg-morado hover:bg-morado/80 text-white font-semibold rounded-full px-4 py-2 mt-4"
                                href="https://api.whatsapp.com/send?phone={{ $settings->site_phone_1 }}&text={{ $mensajeCodificado }}"
                                target="_blank">MATRICULATE AHORA</a>
                        @else
                            <p class="text-gray-100 text-sm text-center mt-4 px-2 py-2 rounded-full bg-red-700">
                                Terminó el
                                periodo de inscripción para este
                                curso</p>
                        @endif
                    </div>
                </div>
                {{-- ESTILO DEL RADAR --}}
                <style>
                    .botonpro {
                        box-shadow: #84219f;
                        animation: pulsers 2s infinite;
                    }

                    @keyframes pulsers {
                        0% {
                            transform: scale(0.80);
                            box-shadow: 0 0 0 0 #84219fa9;
                        }

                        50% {
                            transform: scale(0.85);
                            box-shadow: 0 0 0 12px #84219f26;
                        }

                        100% {
                            transform: scale(0.80);
                            box-shadow: 0 0 0 0 #84219f26;
                        }
                    }
                </style>
                {{-- FIN DEL ESTILO DE RADAR --}}
                <div class="hidden md:block col-span-2">
                    {{-- BOTNN DE SUSCRIBIRSE --}}
                    <div class="bg-gray-50 border border-gray-200 rounded-lg sticky top-24 shadow-md p-4 mb-6 z-20">
                        <h2 class="font-semibold">SE PARTE DE LA CARRERA {{ $course->title }}</h2>
                        <p class="text-xs mt-1"><span class="font-semibold">Nota: </span>
                            Que esperas para formar parte de nuestra institución
                        </p>
                        <div>{{-- {{ route('course.enrolled', $course) }} --}}
                            @if ($course->period && $course->period->isRegistrationOpen())
                                {{-- <a class="block text-center w-full bg-morado hover:bg-morado/80 text-white font-semibold rounded-full px-4 py-2 mt-2 relative overflow-hidden radar-effect botonpro"
                                    href="{{ route('course.inscripcion', $course) }}">MATRICULATE AHORA</a> --}}

                                    <a class="block text-center w-full bg-morado hover:bg-morado/80 text-white font-semibold rounded-full px-4 py-2 mt-2 relative overflow-hidden radar-effect botonpro"
                                    href="https://api.whatsapp.com/send?phone={{ $settings->site_phone_1 }}&text={{ $mensajeCodificado }}" target="_blank">MATRICULATE AHORA</a>
                            @else
                                <p class="text-gray-100 text-sm text-center mt-4 px-2 py-2 rounded-full bg-red-700">
                                    Terminó el periodo de inscripción para este curso
                                </p>
                            @endif
                        </div>
                    </div>
                    {{-- SECCION DE PROFESORES --}}
                    @if ($course->comunicado)
                        {{-- @if ($course->teachers->isNotEmpty()) --}}
                        <div
                            class="bg-naranja border border-gray-200 rounded-lg sticky top-60 shadow-md p-4 profesores-section transition-opacity duration-500">
                            <div class="flex justify-center space-x-2 font-bold">
                                <svg class="size-6 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M480 32c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9L381.7 53c-48 48-113.1 75-181 75l-8.7 0-32 0-96 0c-35.3 0-64 28.7-64 64l0 96c0 35.3 28.7 64 64 64l0 128c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32l0-128 8.7 0c67.9 0 133 27 181 75l43.6 43.6c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6l0-147.6c18.6-8.8 32-32.5 32-60.4s-13.4-51.6-32-60.4L480 32zm-64 76.7L416 240l0 131.3C357.2 317.8 280.5 288 200.7 288l-8.7 0 0-96 8.7 0c79.8 0 156.5-29.8 215.3-83.3z" />
                                </svg>
                                <span class="text-white">
                                    COMUNICADO
                                </span>
                            </div>
                            <hr class="my-2">
                            <p class="text-sm text-white">
                                {{ $course->comunicado }}
                            </p>
                            {{-- <div class="space-y-3">
                                @forelse ($course->teachers as $key => $teacher)
                                    <div x-data="accordion({{ $key + 1 }})"
                                        class="relative transition-all duration-700 border border-verde rounded-xl shadow-lg overflow-hidden">
                                        <div @click="handleClick()"
                                            class="w-full p-4 text-left cursor-pointer bg-white hover:bg-">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-2">
                                                    <figure
                                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                        @if ($teacher->image)
                                                            <img class="h-10 w-10 rounded-full object-cover"
                                                                src="{{ Storage::url($teacher->image->url) }}"
                                                                alt="{{ $teacher->name }}" />
                                                        @else
                                                            <div
                                                                class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-200 text-verde font-bold text-lg">
                                                                {{ $teacher->initials }}
                                                            </div>
                                                        @endif
                                                    </figure>
                                                    <span class="tracking-wide line-clamp-1">
                                                        <b>{{ $teacher->name }}</b>
                                                    </span>
                                                </div>
                                                <span :class="handleRotate()"
                                                    class="transition-transform duration-500 transform fill-current ">
                                                    <svg class="w-5 h-5 fill-current"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>

                                        <div x-ref="tab" :style="handleToggle()"
                                            class="relative overflow-hidden transition-all duration-700 max-h-0 bg-gray-100">
                                            <div class="px-6 py-3 text-gray-700">
                                                <div class="flex justify-center space-x-5">
                                                    <span>
                                                        @if ($teacher->email)
                                                            <a title="correo" href="mailto:{{ $teacher->email }}">
                                                                <svg class="size-6 fill-cyan-600"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 512 512">
                                                                    <path
                                                                        d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                                                                </svg>
                                                            </a>
                                                        @endif
                                                    </span>
                                                    <span>
                                                        @if ($teacher->url)
                                                            <a title="url" href="">
                                                                <svg class="size-6 fill-blue-600"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 512 512">
                                                                    <path
                                                                        d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64zm28.8-64l123.1 0c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64l-123.1 0c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32l-116.7 0c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0l-176.6 0c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0L18.6 160C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192l123.1 0c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64L8.1 320C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6l176.6 0c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352l116.7 0zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6l116.7 0z" />
                                                                </svg>
                                                            </a>
                                                        @endif
                                                    </span>
                                                    <span>
                                                        @if ($teacher->phone)
                                                            @php
                                                                $mensaje = "Hola soy el {$teacher->name} en que puedo ayudarte...";
                                                                $mensajeReemplazado = str_replace(' ', '%20', $mensaje);
                                                            @endphp
                                                            <a title="Whatsapp"
                                                                href="https://api.whatsapp.com/send?phone={{ $teacher->phone }}&text={{ $mensajeReemplazado }}"
                                                                target="_blank"><i
                                                                    class="fab fa-whatsapp text-[#4dc247] text-2xl cursor-pointer"></i></a>
                                                        @endif
                                                    </span>
                                                </div>
                                                @if ($teacher->description)
                                                    <p class="mt-2 text-sm font-medium">{{ $teacher->description }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div> --}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @push('js')
        <script>
            window.addEventListener('scroll', function() {
                var scroll = document.querySelector('.tarjeta-carrito');
                scroll.classList.toggle("active", window.scrollY > 550);
            });

            window.addEventListener('scroll', function() {
                var profesores = document.querySelector(
                    '.profesores-section'); // Seleccionamos la sección de profesores
                var scrollPosition = window.scrollY; // Obtenemos la posición de scroll actual

                // Aquí ajustamos la opacidad de acuerdo con la posición de scroll (puedes ajustar los valores según sea necesario)
                if (scrollPosition > 500) {
                    let opacity = Math.max(0, 1 - (scrollPosition - 450) /
                        100); // Reducimos la opacidad progresivamente
                    profesores.style.opacity = opacity;
                } else {
                    profesores.style.opacity =
                        1; // Aseguramos que sea completamente visible cuando el scroll esté arriba
                }
            });

            document.addEventListener("alpine:init", () => {
                Alpine.store("accordion", {
                    tab: 0
                });

                Alpine.data("accordion", (idx) => ({
                    init() {
                        this.idx = idx;
                    },
                    idx: -1,
                    handleClick() {
                        this.$store.accordion.tab =
                            this.$store.accordion.tab === this.idx ? 0 : this.idx;
                    },
                    handleRotate() {
                        return this.$store.accordion.tab === this.idx ? "-rotate-180" : "";
                    },
                    handleToggle() {
                        return this.$store.accordion.tab === this.idx ?
                            `max-height: ${this.$refs.tab.scrollHeight}px` :
                            "";
                    }
                }));
            });

            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 'auto',
                spaceBetween: 10,
                /* centeredSlides: true, */
                grabCursor: true,
                freeMode: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    dynamicBullets: true,
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    1024: {
                        slidesPerView: 4,
                    },
                },
            });

            /* const swiper = new Swiper('.swiper', {
                // Optional parameters
                direction: 'vertical',
                loop: true,

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                // And if we need scrollbar
                scrollbar: {
                    el: '.swiper-scrollbar',
                },
            }); */
        </script>
    @endpush
</x-app-layout>
