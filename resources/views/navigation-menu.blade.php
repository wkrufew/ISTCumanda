<nav id="navbar" x-data="{ open: false }"
    class="z-40 sticky top-0 md:top-2 right-0 bg-zinc-900 md:bg-zinc-900/0 transition duration-500 ease-in-out py-0 md:py-1 mx-0 md:mx-8 rounded-b-lg md:rounded-full border-verde transform -translate-y-20">
    <!-- Primary Navigation Menu -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        {{-- <x-jet-application-mark class="block h-9 w-auto" /> --}}
                        <img id="logo"{{-- w-14 h-14 md:w-16 md:h-16  --}}
                            class="block w-14 h-14 md:w-16 md:h-16 transition-all duration-300 ease-in"
                            src="{{ asset('imagenes/icono.webp') }}" alt="logo">
                    </a>
                </div>
            </div>
            <!-- Navigation Links -->
            <div class="hidden space-x-2 sm:-my-px sm:ml-10 sm:flex">
                <div id="menu-opcion" class="menu text-white text-sm font-medium px-4 my-2 flex items-center space-x-2">
                    <a href="{{ route('home') }}"
                        class="hover:text-white hover:bg-verde rounded-full px-2 py-1 {{ request()->routeIs('home') ? 'bg-verde text-white' : '' }}">INICIO</a>
                    <a href="{{ route('course.index') }}"
                        class="hover:text-white hover:bg-verde rounded-full px-2 py-1 shrink-0 {{ request()->routeIs('course.*') ? 'bg-verde text-white' : '' }}">OFERTA
                        ACADÉMICA</a>
                    <a href="{{ route('news.index') }}"
                        class="hover:text-white hover:bg-verde rounded-full px-2 py-1 {{ request()->routeIs('news.index') ? 'bg-verde text-white' : '' }} ">
                        NOTICIAS</a>
                    <a href="{{ route('certificados') }}"
                        class="hover:text-white hover:bg-verde rounded-full px-2 py-1 {{ request()->routeIs('certificados') ? 'bg-verde text-white' : '' }} ">
                        CERTIFICACIONES</a>
                    <div class="ms-3 relative hidden md:block hover:text-white hover:bg-verde rounded-full px-2 py-1">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <span class="cursor-pointer">ESTUDIANTES</span>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link aria-label="Aulas" target="_blank"
                                    href="https://elearning.istcumanda.edu.ec/">
                                    {{ __('AULA VIRTUAL') }}
                                </x-dropdown-link>
                                <x-dropdown-link aria-label="Bibliotecas" target="_blank"
                                    href="{{ route('virtual') }}">
                                    {{ __('BIBLIOTECAS') }}
                                </x-dropdown-link>
                                <x-dropdown-link aria-label="Convenios" target="_blank"
                                    href="{{ route('convenios') }}">
                                    {{ __('CONVENIOS') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <a href="{{ route('documents') }}"
                        class="hover:text-white hover:bg-verde rounded-full px-2 py-1 {{ request()->routeIs('documents') ? 'bg-verde text-white' : '' }}">DOCUMENTOS</a>
                    <a href="{{ route('about') }}"
                        class="hover:text-white hover:bg-verde rounded-full px-2 py-1 {{ request()->routeIs('about') ? 'bg-verde text-white' : '' }}">NOSOTROS</a>
                    {{-- <a href="{{ route('contact') }}"
                        class="hover:text-white hover:bg-verde rounded-full px-2 py-1 {{ request()->routeIs('contact') ? 'bg-verde text-white' : '' }} ">
                        CONTACTANOS</a> --}}
                </div>
            </div>
            <div class="text-white text-sm px-6 my-2 flex items-center">
                {{-- ESCRITORIO --}}
                <a href="{{ route('contact') }}"
                    class="hover:text-white hover:bg-verde rounded-full px-2 py-1 font-medium text-sm bg-verdeclaro {{ request()->routeIs('contact') ? 'bg-verdeclaro text-white' : '' }} ">
                    CONTACTANOS</a>
                {{-- <a id="iconos-menu" href="tel:+593984407637"
                    class="hidden md:block tracking-wide px-3 py-1 hover:text-verde text-sm font-medium rounded-full transition duration-300 ease-in-out transform hover:-translate-y-0.5 hover:scale-105">
                    <i class="fas fa-headset text-lg"></i>ss
                </a> --}}
                {{-- MOVIL --}}
                <a href="tel:+593984407637" class="block md:hidden">
                    <i class="fas fa-headset text-lg text-zinc-400"></i>
                </a>
                <div>
                    <div class="ms-3 relative hidden md:block">
                        @auth
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover shrink-0"
                                                src="{{ Auth::user()->profile_photo_url }}"
                                                alt="{{ Auth::user()->name }}" />
                                        </button>
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Administrar cuenta') }}
                                    </div>

                                    @can('Ver Dashboard')
                                        <x-dropdown-link href="{{ route('administrador.dashboard') }}">
                                            {{ __('Administrador') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-200"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            {{ __('Cerrar sesión') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @else
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button aria-label="Opciones de inicio"
                                        class="flex text-sm rounded-full focus:outline-none focus:border-gray-300 transition bg-gray-200">
                                        <svg id="iconos-menu2" class="h-6 w-6 p-1 rounded-full fill-gray-600"
                                            xmlns="http://www.w3.org/2000/svg" fill="#273C99" height="1em"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Opciones de inicio') }}
                                    </div>
                                    <x-dropdown-link aria-label="Login" href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        @endauth
                    </div>
                </div>
            </div>
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" aria-label="hamburger"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="py-4 space-y-5 flex flex-col px-6 text-zinc-300 menu rounded-b-3xl">
            <a href="{{ route('home') }}"
                class="hover:text-verde {{ request()->routeIs('home') ? 'border-l-4 border-verde  px-1 py-1 bg-neutral-700 rounded-lg' : '' }}">INICIO</a>

            <a href="{{ route('course.index') }}"
                class="hover:text-verde {{ request()->routeIs('course.*') ? 'border-l-4 border-verde  px-1 py-1 bg-neutral-700 rounded-lg' : '' }}">CURSOS</a>
            <a href="{{ route('news.index') }}"
                class="hover:text-verde {{ request()->routeIs('news.*') ? 'border-l-4 border-verde  px-1 py-1 bg-neutral-700 rounded-lg' : '' }}">NOTICIAS</a>
            <a href="{{ route('certificados') }}"
                class="hover:text-verde {{ request()->routeIs('certificados') ? 'border-l-4 border-verde  px-1 py-1 bg-neutral-700 rounded-lg' : '' }} ">
                CERTIFICACIONES</a>
            <a href="{{ route('convenios') }}"
                class="hover:text-verde {{ request()->routeIs('convenios') ? 'border-l-4 border-verde  px-1 py-1 bg-neutral-700 rounded-lg' : '' }}">CONVENIOS</a>
            <a href="{{ route('virtual') }}"
                class="hover:text-verde {{ request()->routeIs('virtual') ? 'border-l-4 border-verde  px-1 py-1 bg-neutral-700 rounded-lg' : '' }}">BIBLIOTECAS</a>
            <a href="https://elearning.istcumanda.edu.ec/" class="hover:text-verde">AULA VIRTUAL</a>
            <a href="{{ route('documents') }}"
                class="hover:text-verde {{ request()->routeIs('documents') ? 'border-l-4 border-verde  px-1 py-1 bg-neutral-700 rounded-lg' : '' }}">DOCUMENTOS</a>
            <a href="{{ route('about') }}"
                class="hover:text-verde {{ request()->routeIs('about') ? 'border-l-4 border-verde  px-1 py-1 bg-neutral-700 rounded-lg' : '' }}">NOSOTROS</a>
            <a href="{{ route('contact') }}"
                class="hover:text-verde {{ request()->routeIs('contact') ? 'border-l-4 border-verde  px-1 py-1 bg-neutral-700 rounded-lg' : '' }} ">
                CONTACTANOS</a>

            <!-- Responsive Settings Options -->
            @auth
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="flex-shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </div>
                        @endif

                        <div>
                            <div class="font-medium text-base text-neutral-300">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-neutral-300">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <!-- Account Management -->

                        @can('Ver Dashboard')
                        @endcan

                        @can('Ver Dashboard')
                            <x-responsive-nav-link class="text-neutral-300" href="{{ route('administrador.dashboard') }}"
                                :active="request()->routeIs('administrador.dashboard')">
                                {{ __('Administrador') }}
                            </x-responsive-nav-link>
                        @endcan

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                {{ __('API Tokens') }}
                            </x-responsive-nav-link>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-responsive-nav-link class="text-neutral-300" href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
                                {{ __('Cerrar sesión') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            @else
                <div class="">
                    <a href="{{ route('login') }}"
                        class="hover:text-verde {{ request()->routeIs('login') ? 'border-2 border-verde rounded-full px-2 py-1' : '' }} ">
                        {{ __('LOGIN') }}</a>
                </div>
            @endauth
        </div>
    </div>

</nav>

<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"></script>
<script src="{{ asset('https://unpkg.com/scrollreveal') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        setTimeout(function() {
            var myDiv = document.getElementById("navbar");
            myDiv.classList.add("translate-y-0");
            myDiv.classList.remove("-translate-y-20");
        }, 1000);

        $('.navbar-toggler').click(function() {
            $(this).toggleClass('active');
            $('.navigation-menu').toggleClass('hidden');
            $('#navbar').addClass('bg-white');
        });
        $(function() {
            const navigation = $("#navbar");
            const logos = $("#logo");
            const menuOpcion = $("#menu-opcion");
            const iconosMenu = $("#iconos-menu");
            const iconosMenu2 = $("#iconos-menu2");

            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                if (scroll >= 15) {
                    navigation.addClass(
                        "py-0 shadow-md shadow-verde md:bg-white"); //md:border
                    navigation.removeClass("md:py-1 md:bg-zinc-900/0");
                    //Logo
                    logos.addClass("w-12 h-12");
                    logos.removeClass("md:w-16 md:h-16 w-14 h-14");

                    //Opciones de Menu
                    menuOpcion.addClass("text-verde");
                    menuOpcion.removeClass("text-white");

                    //Iconos de Menu
                    iconosMenu.addClass("text-verde");
                    iconosMenu.removeClass("text-white");

                    //Iconos de Menu2
                    iconosMenu2.addClass("fill-verde");
                    iconosMenu2.removeClass("fill-gray-600");

                } else {
                    navigation.removeClass(
                        "py-0 shadow-md shadow-verde md:bg-white"); //md:border
                    navigation.addClass("md:py-1 md:bg-zinc-900/0");
                    //Logo
                    logos.addClass("md:w-16 md:h-16 w-14 h-14");
                    logos.removeClass("w-12 h-12");

                    //Opciones de Menu
                    menuOpcion.removeClass("text-verde");
                    menuOpcion.addClass("text-white");

                    //Iconos de Menu
                    iconosMenu.removeClass("text-verde");
                    iconosMenu.addClass("text-white");

                    //Iconos de Menu2
                    iconosMenu2.removeClass("fill-verde");
                    iconosMenu2.addClass("fill-gray-600");

                }
            });
        });
    });
</script>
