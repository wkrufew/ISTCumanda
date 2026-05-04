<div class="my-4 max-w-7xl mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-x-0 md:gap-x-4 gap-y-4 mt-0">
        {{-- FILTROS --}}
        <div class="h-full w-full">
            <div class="w-full bg-white sticky top-16 rounded-lg shadow-lg py-3 border border-gray-200"
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
                    <div class="py-1 md:py-2 group">
                        <span
                            class="text-xs font-semibold border border-neutral-800 text-neutral-800 group-hover:bg-neutral-800 group-hover:text-white w-full block py-2 px-2 rounded-md">
                            {{ __('Orden') }}
                        </span>
                        <div class="pt-2 flex-col space-y-2 px-3">
                            <div class="first:w-full flex justify-between items-center">
                                <span
                                    class="text-xs {{ $order == 'desc' ? 'text-rojo font-semibold' : '' }}">{{ __('Recientes') }}</span>
                                <input class="rounded-full checked:bg-rojo checked:text-rojo cursor-pointer"
                                    type="radio" wire:model.live="order" value="desc">
                            </div>
                            <div class="w-full flex justify-between items-center">
                                <span
                                    class="text-xs {{ $order == 'asc' ? 'text-rojo font-semibold' : '' }}">{{ __('Anteriores') }}</span>
                                <input class="rounded-full checked:bg-rojo checked:text-rojo cursor-pointer"
                                    type="radio" wire:model.live="order" value="asc">
                            </div>
                        </div>
                    </div>
                    <div class="py-1 group">
                        <span
                            class="text-xs font-semibold border border-neutral-800 text-neutral-800 block group-hover:bg-neutral-800 group-hover:text-white py-2 px-2 rounded-md">
                            {{-- <i class="fa-solid fa-layer-group pr-1"></i> --}} {{ __('Categorias') }}
                        </span>
                        <div class="pt-2 space-y-2 px-3">
                            @forelse ($categories as $cat)
                                <div class="w-full flex justify-between items-center">
                                    <span class="text-xs">{{ $cat->name }}</span>
                                    <input class="checked:bg-rojo checked:text-rojo cursor-pointer"
                                        wire:model.live="category" type="radio" name="category"
                                        value="{{ $cat->name }}">
                                </div>
                            @empty
                                {{ __('No tiene opciones') }}
                            @endforelse
                        </div>
                    </div>
                    <div>
                        @if ($category != 'all')
                            <button wire:click="limpiar"
                                class="bg-neutral-800 py-2 rounded-md w-full text-white text-xs mt-3 hover:bg-neutral-600 transition duration-500 ease-in-out transform hover:scale-105">
                                <i class="fa-solid fa-trash-can pr-1"></i> {{ __('Borrar Filtros') }}
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-1 md:col-span-2 lg:col-span-3">
            @if ($category != 'all')
                <div
                    class="bg-white rounded-lg shadow-lg p-3 flex justify-between items-center border border-gray-200 mb-4">
                    <h2 class="uppercase font-semibold">Filtrado por: {{ $category }}</h2>
                </div>
            @endif
            {{-- contenido de los CURSOS --}}
            <div class="bg-gray-50 rounded-lg md:shadow-lg p-0 md:p-3 md:border border-gray-200">

                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-3 md:mt-0">
                    @forelse ($courses as $course)
                        <li class="">
                            <a href="{{ route('course.show', $course) }}"
                                class="group block rounded-lg p-4 hover:shadow-md hover:shadow-verde border border-verde">
                                <img alt="{{ $course->title }}" src="{{ Storage::url($course->image->url) }}"
                                    class="h-56 w-full rounded-md object-cover" />

                                <div class="mt-2">
                                    <dl>
                                        <div>
                                            <dd class="text-sm text-gray-500">{{ $course->category->name }}</dd>
                                        </div>
                                        <div class="mt-1">
                                            <dd
                                                class="font-medium tracking-wide text-sm line-clamp-1 group-hover:text-lime-600">
                                                {{ $course->title }}
                                            </dd>
                                        </div>
                                        <p class="tracking-wide line-clamp-2 text-sm mt-2 text-gray-600">
                                            {!! Str::limit($course->description, 60) !!}
                                        </p>
                                    </dl>
                                </div>
                                <hr class="my-2">
                                <div class="flex items-center justify-between gap-8 text-xs">
                                    <div class="flex flex-row gap-2 items-center">
                                        <svg class="size-4 fill-verdeclaro" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                        </svg>

                                        <div class="mt-1.5 sm:mt-0">
                                            <p class="text-gray-500">Duración</p>

                                            <p class="font-medium text-xs line-clamp-1">
                                                {{ $course->duration }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex flex-row items-center justify-center gap-2">
                                        <svg class="size-4 fill-verdeclaro" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                        </svg>

                                        <div class="mt-1.5 sm:mt-0">
                                            <p class="text-gray-500">Modalidad</p>

                                            <p class="font-medium">
                                                {{ $course->modality }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @empty
                        <li class="w-full py-4">Sin resultados</li>
                    @endforelse
                </ul>

                @if ($courses->hasPages())
                    <div class="pt-3">
                        <hr>
                        <div class="pt-3">
                            <span class="mt-2">{{ $courses->links() }}</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
