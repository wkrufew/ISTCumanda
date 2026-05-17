<div>
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
    {{-- ══════════ HERO BANNER ══════════ --}}
    <section class="-mt-20 mb-8">
        <div class="relative overflow-hidden w-full h-40 md:h-56 flex items-end"
             style="background: linear-gradient(135deg, #0e1f05 0%, #1a3a07 45%, #1f0a2e 100%)">
            <div class="absolute top-0 right-0 w-72 h-72 rounded-full opacity-10"
                 style="background: radial-gradient(circle, #7ea41e, transparent); transform: translate(30%,-30%)"></div>
            <div class="absolute bottom-0 left-0 w-56 h-56 rounded-full opacity-10"
                 style="background: radial-gradient(circle, #e59e20, transparent); transform: translate(-30%,30%)"></div>
            <div class="relative max-w-7xl mx-auto px-4 pb-8 pt-20 w-full">
                <span class="inline-block bg-verdeclaro/20 border border-verdeclaro/40 text-verdeclaro text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-2">
                    IST Cumandá
                </span>
                <h1 class="text-white text-2xl md:text-4xl font-extrabold tracking-tight leading-tight">
                    Portal de Noticias
                </h1>
                <p class="text-white/50 text-sm mt-1 hidden md:block">
                    Mantente informado de todo lo que ocurre en el instituto
                </p>
            </div>
            <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 28">
                <path fill="#f9fafb" d="M0,16 C480,32 960,0 1440,16 L1440,28 L0,28 Z"/>
            </svg>
        </div>
    </section>

    {{-- ══════════ CONTENIDO ══════════ --}}
    <section class="max-w-7xl mx-auto px-4 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

            {{-- ── FILTROS ── --}}
            <div class="lg:col-span-1">
                <div class="bg-white sticky top-20 rounded-2xl shadow-sm border border-gray-100 overflow-hidden"
                     x-data="{ openFiltro: false }">

                    <div class="px-4 py-3 flex justify-between items-center border-b border-gray-100"
                         style="background:linear-gradient(135deg,#32620e0a,#7ea41e08)">
                        <span class="font-bold text-sm text-gray-700 flex items-center gap-2">
                            <svg class="size-4 fill-verde" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M3.9 54.9C10.5 40.9 24.5 32 40 32l432 0c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9 320 448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6l0-79.1L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/></svg>
                            FILTROS
                        </span>
                        <button x-on:click="openFiltro = !openFiltro" class="block lg:hidden text-gray-400 hover:text-gray-600">
                            <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': openFiltro, 'inline-flex': !openFiltro }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/>
                                <path :class="{ 'hidden': !openFiltro, 'inline-flex': openFiltro }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <div class="hidden lg:block select-none" :class="{ 'block': openFiltro, 'hidden': !openFiltro }">
                        <div class="px-4 py-4">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Categorías</p>
                            <div class="space-y-2.5">
                                @forelse ($tipos as $tipo)
                                    <label class="flex items-center justify-between cursor-pointer group">
                                        <span class="text-sm transition {{ $selectedTipo == $tipo->id ? 'text-verde font-semibold' : 'text-gray-600 group-hover:text-verde' }}">
                                            {{ $tipo->name }}
                                        </span>
                                        <input class="accent-verde cursor-pointer"
                                            wire:model.live="selectedTipo" type="radio"
                                            name="selectedTipo" value="{{ $tipo->id }}">
                                    </label>
                                @empty
                                    <p class="text-xs text-gray-400">Sin categorías</p>
                                @endforelse
                            </div>
                        </div>

                        @if ($selectedTipo)
                            <div class="px-4 pb-4">
                                <button wire:click="limpiarFiltro"
                                    class="w-full bg-verde text-white text-xs font-semibold py-2 rounded-xl hover:bg-verde/80 transition flex items-center justify-center gap-1.5">
                                    <svg class="size-3 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M105.1 202.6c7.7-21.8 20.2-42.3 37.8-59.8c62.5-62.5 163.8-62.5 226.3 0L386.3 160 352 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l111.5 0 .4 0c17.7 0 32-14.3 32-32l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 35.2L414.4 97.6c-87.5-87.5-229.3-87.5-316.8 0C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5zM39 289.3c-5 1.5-9.8 4.2-13.7 8.2c-4 4-6.7 8.8-8.1 14c-.3 1.2-.6 2.5-.8 3.8c-.3 1.7-.4 3.4-.4 5.1L16 432c0 17.7 14.3 32 32 32s32-14.3 32-32l0-35.1 17.6 17.5c87.5 87.4 229.3 87.4 316.7 0c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.5 62.5-163.8 62.5-226.3 0l-17.5-17.5 35.1 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L73.3 288c-11.8-.1-23.4 3.8-34.3 1.3z"/></svg>
                                    Borrar filtro
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ── COLUMNA PRINCIPAL ── --}}
            <div class="lg:col-span-2 space-y-5">

                {{-- HERO: primer destacado --}}
                @if ($relevantPosts->isNotEmpty())
                    @php $hero = $relevantPosts->first(); @endphp
                    <a href="{{ route('news.show', $hero) }}" class="block group">
                        <article class="relative rounded-2xl overflow-hidden shadow-lg h-72 md:h-96">
                            <img src="{{ Storage::url($hero->image->url) }}"
                                 alt="{{ $hero->title }}"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                 loading="eager" width="800" height="400">
                            {{-- Overlay --}}
                            <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(10,25,5,0.97) 0%, rgba(10,25,5,0.55) 45%, rgba(10,25,5,0.1) 100%)"></div>
                            {{-- Borde sutil en hover --}}
                            <div class="absolute inset-0 rounded-2xl border-2 border-transparent group-hover:border-verdeclaro/40 transition-all duration-300"></div>

                            {{-- Badges --}}
                            <div class="absolute top-4 left-4 flex items-center gap-2">
                                <span class="bg-naranja text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full flex items-center gap-1 shadow-lg">
                                    <svg class="size-3 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.4 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                    DESTACADO
                                </span>
                                <span class="bg-black/30 backdrop-blur-sm text-white text-[10px] font-semibold px-2.5 py-1 rounded-full border border-white/20">
                                    {{ $hero->tipo->name }}
                                </span>
                            </div>

                            {{-- Contenido --}}
                            <div class="absolute bottom-0 left-0 right-0 p-5 md:p-6">
                                <h2 class="text-white font-extrabold text-lg md:text-2xl leading-tight line-clamp-2 group-hover:text-verdeclaro transition-colors duration-300">
                                    {{ $hero->title }}
                                </h2>
                                <p class="text-white/65 text-sm mt-2 line-clamp-2 hidden sm:block">
                                    {{ Str::limit(strip_tags($hero->description), 120) }}
                                </p>
                                <div class="flex items-center gap-4 mt-3">
                                    <span class="flex items-center gap-1.5 text-white/50 text-xs">
                                        <svg class="size-3.5 fill-white/50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>
                                        {{ $hero->created_at->diffForHumans() }}
                                    </span>
                                    <span class="flex items-center gap-1.5 text-white/50 text-xs">
                                        <svg class="size-3.5 fill-white/50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/></svg>
                                        {{ $hero->user->name }}
                                    </span>
                                    <span class="ml-auto inline-flex items-center gap-1 text-verdeclaro text-xs font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        Leer noticia
                                        <svg class="size-3.5 fill-verdeclaro" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                                    </span>
                                </div>
                            </div>
                        </article>
                    </a>
                @endif

                {{-- FEED DE NOTICIAS --}}
                <div class="space-y-3">
                    @forelse ($posts as $post)
                        <a href="{{ route('news.show', $post) }}" wire:key="{{ $post->id }}" class="group block">
                            <article class="bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-md hover:border-verde/30 transition-all duration-300 flex">
                                <div class="w-28 sm:w-40 shrink-0 overflow-hidden">
                                    <img src="{{ Storage::url($post->image->url) }}"
                                         alt="{{ $post->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                         loading="lazy" width="160" height="128">
                                </div>
                                <div class="flex flex-col justify-between p-3 sm:p-4 min-w-0 flex-1">
                                    <div>
                                        <span class="inline-block bg-verde/10 text-verde text-[10px] font-bold uppercase tracking-wide px-2 py-0.5 rounded-full mb-1.5">
                                            {{ $post->tipo->name }}
                                        </span>
                                        <h2 class="font-bold text-gray-800 text-sm leading-snug line-clamp-2 group-hover:text-verde transition-colors duration-200">
                                            {{ $post->title }}
                                        </h2>
                                        <p class="text-gray-500 text-xs mt-1 line-clamp-2 hidden sm:block leading-relaxed">
                                            {{ Str::limit(strip_tags($post->description), 90) }}
                                        </p>
                                    </div>
                                    <div class="flex items-center justify-between mt-2">
                                        <div class="flex items-center gap-3 text-gray-400 text-xs">
                                            <span class="flex items-center gap-1">
                                                <svg class="size-3 fill-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>
                                                {{ $post->created_at->diffForHumans() }}
                                            </span>
                                            <span class="hidden sm:flex items-center gap-1">
                                                <svg class="size-3 fill-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/></svg>
                                                {{ $post->user->name }}
                                            </span>
                                        </div>
                                        <svg class="size-4 fill-gray-300 group-hover:fill-verde group-hover:translate-x-1 transition-all duration-200 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                                    </div>
                                </div>
                            </article>
                        </a>
                    @empty
                        @if ($relevantPosts->isEmpty())
                            <div class="bg-white rounded-2xl border border-gray-100 py-16 text-center">
                                <svg class="mx-auto mb-3 size-12 fill-gray-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                                <p class="text-gray-400 font-medium">No hay noticias disponibles</p>
                                @if ($selectedTipo)
                                    <button wire:click="limpiarFiltro" class="mt-3 text-verde text-sm underline">Quitar filtro</button>
                                @endif
                            </div>
                        @endif
                    @endforelse
                </div>

                {{-- Cargar más --}}
                @if ($hasMore)
                    <div class="flex justify-center pt-2">
                        <button wire:click="loadMore" wire:loading.attr="disabled" wire:loading.class="opacity-60 cursor-not-allowed"
                            class="inline-flex items-center gap-2 px-6 py-2.5 bg-white border-2 border-verde text-verde font-semibold text-sm rounded-full hover:bg-verde hover:text-white transition-all duration-300 shadow-sm">
                            <span wire:loading.remove wire:target="loadMore">Cargar más noticias</span>
                            <span wire:loading wire:target="loadMore">Cargando...</span>
                            <svg wire:loading.remove wire:target="loadMore" class="size-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M105.1 202.6c7.7-21.8 20.2-42.3 37.8-59.8c62.5-62.5 163.8-62.5 226.3 0L386.3 160 352 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l111.5 0 .4 0c17.7 0 32-14.3 32-32l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 35.2L414.4 97.6c-87.5-87.5-229.3-87.5-316.8 0C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5zM39 289.3c-5 1.5-9.8 4.2-13.7 8.2c-4 4-6.7 8.8-8.1 14c-.3 1.2-.6 2.5-.8 3.8c-.3 1.7-.4 3.4-.4 5.1L16 432c0 17.7 14.3 32 32 32s32-14.3 32-32l0-35.1 17.6 17.5c87.5 87.4 229.3 87.4 316.7 0c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.5 62.5-163.8 62.5-226.3 0l-17.5-17.5 35.1 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L73.3 288c-11.8-.1-23.4 3.8-34.3 1.3z"/></svg>
                        </button>
                    </div>
                @endif
            </div>

            {{-- ── SIDEBAR DESTACADOS ── --}}
            <div class="hidden lg:block lg:col-span-1">
                <div class="sticky top-20">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="block h-5 w-1 rounded-full bg-naranja"></span>
                        <h3 class="text-xs font-black uppercase tracking-widest text-gray-700">Lo más destacado</h3>
                    </div>

                    @if ($relevantPosts->isNotEmpty())
                        <div class="space-y-3 overflow-y-auto max-h-[78vh] pr-0.5"
                             style="scrollbar-width:none;-ms-overflow-style:none">
                            @foreach ($relevantPosts as $post)
                                <a href="{{ route('news.show', $post) }}" wire:key="rel-{{ $post->id }}"
                                   class="group flex gap-3 bg-white rounded-xl border border-gray-100 overflow-hidden hover:border-naranja/50 hover:shadow-md transition-all duration-200 p-2.5">
                                    <div class="w-20 h-16 shrink-0 rounded-lg overflow-hidden">
                                        <img src="{{ Storage::url($post->image->url) }}"
                                             alt="{{ $post->title }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-400"
                                             loading="lazy" width="80" height="64">
                                    </div>
                                    <div class="min-w-0 flex flex-col justify-between">
                                        <div>
                                            @if ($loop->first)
                                                <span class="inline-flex items-center gap-0.5 text-[9px] font-black text-naranja uppercase tracking-widest">
                                                    <svg class="size-2.5 fill-naranja" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.4 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                                    Destacado
                                                </span>
                                            @else
                                                <span class="text-[9px] font-semibold text-gray-400 uppercase tracking-widest">{{ $post->tipo->name }}</span>
                                            @endif
                                            <p class="text-xs font-semibold text-gray-700 line-clamp-2 mt-0.5 group-hover:text-verde transition-colors leading-snug">
                                                {{ $post->title }}
                                            </p>
                                        </div>
                                        <p class="text-[10px] text-gray-400 mt-1">{{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-white rounded-xl border border-gray-100 p-5 text-center">
                            <svg class="mx-auto mb-2 size-8 fill-gray-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.4 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                            <p class="text-xs text-gray-400">Sin noticias destacadas</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>
</div>
