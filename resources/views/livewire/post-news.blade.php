<div>
    <section class="-mt-20">
        <div
            class="w-full rounded-b-lg shadow-md bg-neutral-900 border-b-2 border-verde h-32 md:h-44 flex justify-center items-center">
            <h1 class="text-sm md:text-2xl font-semibold text-verdeclaro pt-16">ENTERATE DE LO NUEVO QUE TIENE
                ISTCUMANDA PARA TI</h1>
        </div>
    </section>

    <section class="my-4 md:my-6 max-w-7xl mx-auto">
        <div class="grid grid-cols-4 gap-4 lg:gap-24">
            {{-- SECCION IZQUIERDA --}}
            <div class="col-span-4 md:col-span-1">
                <div class=" bg-white sticky top-20 rounded-lg shadow-lg py-3 border border-gray-200 mx-2 md:mx-0"
                    x-data="{ openFiltro: false }">

                    <div class="flex justify-between items-center">
                        <span class="text-center font-bold text-sm pl-2"><i class="fa-solid fa-sliders pr-1"></i>
                            {{ __('FILTROS') }}</span>
                        <button x-on:click="openFiltro = !openFiltro" class="block sm:hidden pr-2">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': openFiltro, 'inline-flex': !openFiltro }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !openFiltro, 'inline-flex': openFiltro }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex-col hidden sm:block select-none mx-2"
                        :class="{ 'block': openFiltro, 'hidden': !openFiltro }">

                        <div class="py-1 group">
                            <span
                                class="text-xs font-semibold border border-neutral-800 text-neutral-800 block group-hover:bg-neutral-800 group-hover:text-white py-2 px-2 rounded-md">
                                {{ __('Categorias') }}
                            </span>
                            <div class="pt-2 space-y-2 px-3">
                                @forelse ($tipos as $tipo)
                                    <div class="w-full flex justify-between items-center">
                                        <span class="text-xs">{{ $tipo->name }}</span>
                                        <input class="checked:bg-verde checked:text-verde cursor-pointer"
                                            wire:model.live="selectedTipo" type="radio" name="selectedTipo"
                                            value="{{ $tipo->id }}">
                                    </div>
                                @empty
                                    {{ __('No tiene opciones') }}
                                @endforelse
                            </div>
                        </div>
                        <div>
                            @if ($selectedTipo != null)
                                <button wire:click="limpiarFiltro"
                                    class="bg-neutral-800 py-2 rounded-md w-full text-white text-xs mt-3 hover:bg-neutral-600 transition duration-500 ease-in-out transform hover:scale-105">
                                    <i class="fa-solid fa-trash-can pr-1"></i> {{ __('Borrar Filtros') }}
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- SECCION PRINCIPAL --}}
            <div class="col-span-4 md:col-span-2 bg-gray-100 rounded-none md:rounded-lg">
                <style>
                    .destacado {
                        border: 2px solid rgba(0, 255, 0, 0.698);
                        /* Borde dorado para destacar */
                        background-color: #edfff2;
                        /* Fondo amarillo claro */
                    }
                </style>
                @if ($isMobile)
                    @forelse ($relevantPosts as $post)
                        <article class="m-4 rounded-lg overflow-hidden border border-sky-600 bg-sky-50">
                            <figure class="bg-gray-400 h-80 w-full">
                                <img alt="{{ $post->title }}" src="{{ Storage::url($post->image->url) }}"
                                    class="w-full h-80 object-cover object-center" />
                            </figure>
                            <div class="p-4">
                                <h3 class="">
                                    <span
                                        class="px-2 py-1 rounded-full bg-sky-200 text-sky-700 text-xs font-medium">{{ $post->tipo->name }}</span>
                                </h3>
                                <h2 class="font-semibold mt-2 line-clamp-2 text-sm">
                                    {{ $post->title }}
                                </h2>
                                <p class="mt-1 text-xs">
                                    {!! Str::limit($post->description, 50) !!}

                                </p>
                                <div class="mt-2 flex justify-between text-xs text-gray-600">
                                    <div class="flex space-x-1 items-center">
                                        <span>
                                            <svg class="fill-gray-500 size-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                            </svg>
                                        </span>
                                        <span>
                                            {{ $post->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <div class="flex space-x-1 items-center">
                                        <span>
                                            <svg class="fill-gray-500 size-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                                            </svg>
                                        </span>
                                        <span>
                                            {{ $post->user->name }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @empty
                    @endforelse
                @endif
                {{-- LISTADO PRINCIPAL DE POST --}}
                @forelse ($posts as $post)
                    <a href="{{ route('news.show', $post) }}">
                        <article class="m-2 md:m-4 bg-white rounded-lg overflow-hidden">
                            <figure class="bg-gray-400 h-80 w-full">
                                <img alt="{{ $post->title }}" src="{{ Storage::url($post->image->url) }}"
                                    class="w-full h-80 object-cover object-center" />
                            </figure>
                            <div class="p-4">
                                <h3 class="">
                                    <span
                                        class="px-2 py-1 rounded-full bg-sky-200 text-sky-700 text-xs font-medium">{{ $post->tipo->name }}</span>
                                </h3>
                                <h2 class="font-semibold mt-2 text-sm">
                                    {{ $post->title }}
                                </h2>
                                <p class="mt-1 text-xs">
                                    {!! Str::limit($post->description, 140) !!}
                                </p>
                                <div class="mt-2 flex justify-between text-xs text-gray-600">
                                    <div class="flex space-x-1 items-center">
                                        <span>
                                            <svg class="fill-gray-500 size-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                            </svg>
                                        </span>
                                        <span>
                                            {{ $post->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <div class="flex space-x-1 items-center">
                                        <span>
                                            <svg class="fill-gray-500 size-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                                            </svg>
                                        </span>
                                        <span>
                                            {{ $post->user->name }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </a>
                @empty
                    {{-- <div class="m-4 bg-white rounded-lg overflow-hidden">
                        <div class="p-4">
                            <h2 class="font-semibold mt-2">
                                No hay publicaciones disponibles
                            </h2>
                        </div>
                    </div> --}}
                @endforelse

                @if ($posts->count() == 0 && $relevantPosts->count() == 0)
                    <div class="flex justify-center items-center overflow-hidden">
                        <div class="p-4">
                            <h2 class="font-semibold mt-2 text-sm">
                                No hay publicaciones disponibles
                            </h2>
                        </div>
                    </div>
                @endif
                {{-- <article class="m-4 bg-white rounded-lg overflow-hidden">
                    <figure class="bg-gray-400 h-80 w-full">
                        <img class="w-full h-80 object-cover"
                            src="https://images.pexels.com/photos/356056/pexels-photo-356056.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="">
                    </figure>
                    <div class="p-4">
                        <h3 class="">
                            <span
                                class="px-2 py-1 rounded-full bg-sky-200 text-sky-700 text-xs font-medium">Convocatorias</span>
                        </h3>
                        <h2 class="font-semibold mt-2">
                            Hola este es una publicacion de prueba
                        </h2>
                        <p class="mt-1 text-sm">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est tempora modi, aliquam expedita
                            sed at similique sint quam neque illum. Enim alias non sapiente molestiae culpa nisi
                            repudiandae obcaecati molestias.
                        </p>
                        <div class="mt-2 flex justify-between text-xs text-gray-600">
                            <div class="flex space-x-1 items-center">
                                <span>
                                    <svg class="fill-gray-500 size-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                    </svg>
                                </span>
                                <span>
                                    Hace 5 minutos
                                </span>
                            </div>
                            <div class="flex space-x-1 items-center">
                                <span>
                                    <svg class="fill-gray-500 size-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                                    </svg>
                                </span>
                                <span>
                                    Publicado por Admin
                                </span>
                            </div>
                        </div>
                    </div>
                </article> --}}

                @if (count($posts) >= $perPage)
                    <div class="flex justify-center mb-4">
                        <button wire:click="loadMore"
                            class="px-4 py-2 bg-green-200 text-green-700 rounded-full text-sm">
                            Cargar más
                        </button>
                    </div>
                @endif
            </div>

            {{-- SECCION DERECHA --}}
            <div class="hidden md:block md:col-span-1">
                <style>
                    /* Ocultar barras de desplazamiento */
                    .scrollbar-hide::-webkit-scrollbar {
                        display: none;
                    }

                    .scrollbar-hide {
                        -ms-overflow-style: none;
                        /* IE and Edge */
                        scrollbar-width: none;
                        /* Firefox */
                    }
                </style>
                <div
                    class="sticky top-20 space-y-4 overflow-y-auto {{ $relevantPosts->count() > 1 || $posts->count() > 1 ? 'h-[88vh]' : 'h-auto' }}  scrollbar-hide">
                    <h3 class="font-semibold text-center">
                        LO MAS DESTACADO
                    </h3>

                    @if ($relevantPosts->count() > 0)
                        @foreach ($relevantPosts as $post)
                            <article class="bg-white rounded-lg overflow-hidden border border-gray-200 shadow">
                                <figure>
                                    {{-- <img class="w-full h-40 object-cover"
                                        src="https://images.pexels.com/photos/356056/pexels-photo-356056.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                        alt=""> --}}
                                    <img alt="{{ $post->title }}" src="{{ Storage::url($post->image->url) }}"
                                        class="w-full h-40 object-cover object-center" />
                                </figure>
                                <div class="p-2">
                                    <h2 class="">
                                        <span
                                            class="px-2 py-1 rounded-full bg-sky-200 text-sky-700 text-xs font-medium">{{ $post->tipo->name }}</span>
                                    </h2>
                                    <h3 class="font-semibold text-sm mt-2 line-clamp-2">
                                        {{ $post->title }}
                                    </h3>
                                    <div class="mt-2 flex justify-between text-xs text-gray-600">
                                        <div class="flex space-x-1 items-center">
                                            <span>
                                                <svg class="fill-gray-500 size-3" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512">
                                                    <path
                                                        d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                                </svg>
                                            </span>
                                            <span>
                                                {{ $post->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        <div class="flex space-x-1 items-center">
                                            <span>
                                                <svg class="fill-gray-500 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                                                </svg>
                                            </span>
                                            <span>
                                                {{ $post->user->name }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @else
                        <div class="p-4 bg-white rounded-lg border border-gray-200 shadow-md">
                            <h3 class="font-semibold text-center text-sm">
                                No hay publicaciones destacadas
                            </h3>
                        </div>
                    @endif
                    {{-- <article class="bg-white rounded-lg overflow-hidden border border-gray-200 shadow">
                        <figure>
                            <img class="w-full h-40 object-cover"
                                src="https://images.pexels.com/photos/356056/pexels-photo-356056.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="">
                        </figure>
                        <div class="p-2">
                            <h2 class="">
                                <span
                                    class="px-2 py-1 rounded-full bg-sky-200 text-sky-700 text-xs font-medium">Convocatorias</span>
                            </h2>
                            <h3 class="font-semibold text-sm text-center mt-1">
                                Hola este es una publicacion de prueba
                            </h3>
                            <div class="mt-2 flex justify-between text-xs text-gray-600">
                                <div class="flex space-x-1 items-center">
                                    <span>
                                        <svg class="fill-gray-500 size-3" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                        </svg>
                                    </span>
                                    <span>
                                        Hace 5 minutos
                                    </span>
                                </div>
                                <div class="flex space-x-1 items-center">
                                    <span>
                                        <svg class="fill-gray-500 size-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                                        </svg>
                                    </span>
                                    <span>
                                        Publicado por Admin
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="bg-white rounded-lg overflow-hidden border border-gray-200 shadow">
                        <figure>
                            <img class="w-full h-40 object-cover"
                                src="https://images.pexels.com/photos/356056/pexels-photo-356056.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="">
                        </figure>
                        <div class="p-2">
                            <h2 class="">
                                <span
                                    class="px-2 py-1 rounded-full bg-sky-200 text-sky-700 text-xs font-medium">Convocatorias</span>
                            </h2>
                            <h3 class="font-semibold text-sm text-center mt-1">
                                Hola este es una publicacion de prueba
                            </h3>
                            <div class="mt-2 flex justify-between text-xs text-gray-600">
                                <div class="flex space-x-1 items-center">
                                    <span>
                                        <svg class="fill-gray-500 size-3" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                        </svg>
                                    </span>
                                    <span>
                                        Hace 5 minutos
                                    </span>
                                </div>
                                <div class="flex space-x-1 items-center">
                                    <span>
                                        <svg class="fill-gray-500 size-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                                        </svg>
                                    </span>
                                    <span>
                                        Publicado por Admin
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="bg-white rounded-lg overflow-hidden border border-gray-200 shadow">
                        <figure>
                            <img class="w-full h-40 object-cover"
                                src="https://images.pexels.com/photos/356056/pexels-photo-356056.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="">
                        </figure>
                        <div class="p-2">
                            <h2 class="">
                                <span
                                    class="px-2 py-1 rounded-full bg-sky-200 text-sky-700 text-xs font-medium">Convocatorias</span>
                            </h2>
                            <h3 class="font-semibold text-sm text-center mt-1">
                                Hola este es una publicacion de prueba
                            </h3>
                            <div class="mt-2 flex justify-between text-xs text-gray-600">
                                <div class="flex space-x-1 items-center">
                                    <span>
                                        <svg class="fill-gray-500 size-3" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                        </svg>
                                    </span>
                                    <span>
                                        Hace 5 minutos
                                    </span>
                                </div>
                                <div class="flex space-x-1 items-center">
                                    <span>
                                        <svg class="fill-gray-500 size-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                                        </svg>
                                    </span>
                                    <span>
                                        Publicado por Admin
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="bg-white rounded-lg overflow-hidden border border-gray-200 shadow">
                        <figure>
                            <img class="w-full h-40 object-cover"
                                src="https://images.pexels.com/photos/356056/pexels-photo-356056.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="">
                        </figure>
                        <div class="p-2">
                            <h2 class="">
                                <span
                                    class="px-2 py-1 rounded-full bg-sky-200 text-sky-700 text-xs font-medium">Convocatorias</span>
                            </h2>
                            <h3 class="font-semibold text-sm text-center mt-1">
                                Hola este es una publicacion de prueba
                            </h3>
                            <div class="mt-2 flex justify-between text-xs text-gray-600">
                                <div class="flex space-x-1 items-center">
                                    <span>
                                        <svg class="fill-gray-500 size-3" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                        </svg>
                                    </span>
                                    <span>
                                        Hace 5 minutos
                                    </span>
                                </div>
                                <div class="flex space-x-1 items-center">
                                    <span>
                                        <svg class="fill-gray-500 size-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                                        </svg>
                                    </span>
                                    <span>
                                        Publicado por Admin
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article> --}}
                </div>
            </div>
        </div>
    </section>


    <section class="mb-16">

    </section>
</div>
