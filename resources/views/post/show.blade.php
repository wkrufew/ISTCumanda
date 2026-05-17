<x-app-layout>
    @section('title', '| ' . Str::limit($post->title, 45))
    @section('description', Str::limit(strip_tags($post->description), 160))
    @section('keywords', 'educación, noticias, ' . $post->tipo->name . ', ' . $post->title)
    @section('url', route('news.show', $post))
    @section('img', $post->image ? Storage::url($post->image->url) : asset('imagenes/IST_LOGO.webp'))

    @section('og-tags')
        <meta property="og:url"     content="{{ route('news.show', $post) }}">
        <meta property="og:type"    content="article">
        <meta property="article:published_time" content="{{ $post->created_at->toIso8601String() }}">
        <meta property="article:author" content="{{ $post->user->name }}">
        <meta property="article:section" content="{{ $post->tipo->name }}">
    @endsection

    {{-- ══════════ HERO ══════════ --}}
    <section class="-mt-20 relative">
        <div class="relative w-full h-72 sm:h-96 md:h-[480px] overflow-hidden">
            <img src="{{ Storage::url($post->image->url) }}"
                 alt="{{ $post->title }}"
                 class="w-full h-full object-cover"
                 fetchpriority="high" width="1280" height="480">
            {{-- Gradiente multi-capa --}}
            <div class="absolute inset-0"
                 style="background: linear-gradient(to top, rgba(5,15,3,0.97) 0%, rgba(5,15,3,0.70) 35%, rgba(10,25,5,0.30) 70%, transparent 100%)"></div>
            {{-- Orbe morado sutil --}}
            <div class="absolute top-0 right-0 w-96 h-96 rounded-full opacity-20 pointer-events-none"
                 style="background: radial-gradient(circle, #84219f, transparent); transform: translate(30%,-30%)"></div>

            {{-- Breadcrumb --}}
            <div class="absolute top-0 left-0 right-0 pt-24 px-4 max-w-5xl mx-auto">
                <nav class="flex items-center gap-1.5 text-white/50 text-xs">
                    <a href="{{ route('home') }}" class="hover:text-white transition">Inicio</a>
                    <svg class="size-3 fill-white/30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                    <a href="{{ route('news.index') }}" class="hover:text-white transition">Noticias</a>
                    <svg class="size-3 fill-white/30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                    <span class="text-white/70 line-clamp-1">{{ Str::limit($post->title, 40) }}</span>
                </nav>
            </div>

            {{-- Contenido hero --}}
            <div class="absolute bottom-0 left-0 right-0 pb-7 px-4">
                <div class="max-w-5xl mx-auto">
                    <div class="flex flex-wrap items-center gap-2 mb-3">
                        <span class="bg-verde text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full">
                            {{ $post->tipo->name }}
                        </span>
                        @if ($post->is_relevant)
                            <span class="bg-naranja text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full flex items-center gap-1">
                                <svg class="size-3 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.4 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                Destacado
                            </span>
                        @endif
                    </div>
                    <h1 class="text-white text-2xl sm:text-3xl md:text-4xl font-extrabold leading-tight tracking-tight max-w-3xl">
                        {{ $post->title }}
                    </h1>
                    <div class="flex flex-wrap items-center gap-4 mt-4 text-white/55 text-xs">
                        <span class="flex items-center gap-1.5">
                            <svg class="size-3.5 fill-white/55" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/></svg>
                            {{ $post->user->name }}
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="size-3.5 fill-white/55" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>
                            {{ $post->created_at->translatedFormat('d \d\e F, Y') }}
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="size-3.5 fill-white/55" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Wave divider --}}
        <svg class="w-full -mt-px block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 28" style="background:#050f03">
            <path fill="#f9fafb" d="M0,16 C480,32 960,0 1440,16 L1440,28 L0,28 Z"/>
        </svg>
    </section>

    {{-- ══════════ CUERPO ══════════ --}}
    <section class="max-w-5xl mx-auto px-4 pb-24">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- ── ARTÍCULO ── --}}
            <div class="lg:col-span-2">

                {{-- Adjunto / URL --}}
                @if ($post->url)
                    <a href="{{ $post->url }}" target="_blank" rel="noopener"
                       class="flex items-center gap-3 bg-azul/5 border border-azul/20 rounded-2xl px-5 py-4 mb-6 group hover:bg-azul/10 transition">
                        <div class="size-10 rounded-xl flex items-center justify-center shrink-0"
                             style="background:linear-gradient(135deg,#0369a1,#0284c7)">
                            <svg class="size-5 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-xs font-bold text-azul uppercase tracking-widest">Documento adjunto</p>
                            <p class="text-sm text-gray-600 truncate group-hover:text-azul transition">{{ $post->url }}</p>
                        </div>
                        <svg class="size-5 fill-azul/40 group-hover:fill-azul group-hover:translate-x-1 transition-all duration-200 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                    </a>
                @endif

                {{-- Contenido del artículo --}}
                <article class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 md:px-10 py-8 prose prose-sm prose-gray max-w-none
                                prose-headings:font-extrabold prose-headings:text-gray-800
                                prose-p:leading-relaxed prose-p:text-gray-700
                                prose-a:text-verde prose-a:no-underline hover:prose-a:underline
                                prose-strong:text-gray-800
                                prose-img:rounded-xl prose-img:shadow-md
                                prose-ul:space-y-1 prose-ol:space-y-1
                                prose-blockquote:border-l-verde prose-blockquote:bg-verde/5 prose-blockquote:rounded-r-xl">
                        {!! $post->description !!}
                    </div>

                    {{-- Footer del artículo --}}
                    <div class="mx-6 md:mx-10 mb-8 pt-6 border-t border-gray-100 flex items-center justify-between flex-wrap gap-4">
                        <div class="flex items-center gap-3">
                            <div class="size-10 rounded-full flex items-center justify-center text-white text-sm font-black"
                                 style="background:linear-gradient(135deg,#32620e,#7ea41e)">
                                {{ strtoupper(substr($post->user->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Publicado por</p>
                                <p class="text-sm font-bold text-gray-700">{{ $post->user->name }}</p>
                            </div>
                        </div>
                        <a href="{{ route('news.index') }}"
                           class="inline-flex items-center gap-2 text-sm text-verde font-semibold hover:text-verdeclaro transition group">
                            <svg class="size-4 fill-current group-hover:-translate-x-1 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                            Volver a noticias
                        </a>
                    </div>
                </article>

                {{-- Compartir --}}
                <div class="mt-6 bg-white rounded-2xl border border-gray-100 shadow-sm px-6 py-5">
                    <p class="text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Compartir noticia</p>
                    <div class="flex flex-wrap gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('news.show', $post)) }}"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-white transition hover:opacity-90"
                           style="background:#1877f2">
                            <svg class="size-3.5 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>
                            Facebook
                        </a>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' — ' . route('news.show', $post)) }}"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-white transition hover:opacity-90"
                           style="background:#25d366">
                            <svg class="size-3.5 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                            WhatsApp
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(route('news.show', $post)) }}"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-white transition hover:opacity-90"
                           style="background:#000">
                            <svg class="size-3.5 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                            X (Twitter)
                        </a>
                    </div>
                </div>
            </div>

            {{-- ── SIDEBAR ── --}}
            <div class="lg:col-span-1 space-y-5">

                {{-- Ficha de la noticia --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="px-5 py-3 border-b border-gray-100"
                         style="background:linear-gradient(135deg,#32620e0a,#7ea41e08)">
                        <p class="text-[10px] font-black uppercase tracking-widest text-verde">Ficha de la noticia</p>
                    </div>
                    <div class="px-5 py-4 space-y-4">

                        <div class="flex items-start gap-3">
                            <div class="size-8 rounded-lg flex items-center justify-center shrink-0 mt-0.5"
                                 style="background:linear-gradient(135deg,#32620e15,#7ea41e15)">
                                <svg class="size-4 fill-verde" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M3.9 54.9C10.5 40.9 24.5 32 40 32l432 0c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9 320 448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6l0-79.1L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider">Categoría</p>
                                <p class="text-sm font-bold text-gray-700">{{ $post->tipo->name }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="size-8 rounded-lg flex items-center justify-center shrink-0 mt-0.5"
                                 style="background:linear-gradient(135deg,#0369a115,#0284c715)">
                                <svg class="size-4 fill-azul" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider">Autor</p>
                                <p class="text-sm font-bold text-gray-700">{{ $post->user->name }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="size-8 rounded-lg flex items-center justify-center shrink-0 mt-0.5"
                                 style="background:linear-gradient(135deg,#84219f15,#a020f015)">
                                <svg class="size-4" style="fill:#84219f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider">Publicado</p>
                                <p class="text-sm font-bold text-gray-700">{{ $post->created_at->translatedFormat('d \d\e F, Y') }}</p>
                                <p class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        @if ($post->is_relevant)
                            <div class="flex items-center gap-2 bg-naranja/10 border border-naranja/20 rounded-xl px-3 py-2.5">
                                <svg class="size-4 fill-naranja shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.4 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                <span class="text-xs font-bold text-naranja">Noticia Destacada</span>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Posts relacionados --}}
                @if ($related->isNotEmpty())
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                        <div class="px-5 py-3 border-b border-gray-100"
                             style="background:linear-gradient(135deg,#32620e0a,#7ea41e08)">
                            <p class="text-[10px] font-black uppercase tracking-widest text-verde">Más en {{ $post->tipo->name }}</p>
                        </div>
                        <div class="divide-y divide-gray-50">
                            @foreach ($related as $rel)
                                <a href="{{ route('news.show', $rel) }}"
                                   class="flex gap-3 p-4 group hover:bg-gray-50/70 transition">
                                    <div class="w-20 h-14 shrink-0 rounded-xl overflow-hidden">
                                        <img src="{{ Storage::url($rel->image->url) }}"
                                             alt="{{ $rel->title }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                             loading="lazy" width="80" height="56">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-xs font-semibold text-gray-700 line-clamp-2 group-hover:text-verde transition-colors leading-snug">
                                            {{ $rel->title }}
                                        </p>
                                        <p class="text-[10px] text-gray-400 mt-1">{{ $rel->created_at->diffForHumans() }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="px-5 pb-4 pt-2">
                            <a href="{{ route('news.index') }}"
                               class="flex items-center justify-center gap-1.5 text-xs font-bold text-verde hover:text-verdeclaro transition">
                                Ver todas las noticias
                                <svg class="size-3.5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                            </a>
                        </div>
                    </div>
                @endif

                {{-- Volver --}}
                <a href="{{ route('news.index') }}"
                   class="flex items-center justify-center gap-2 w-full py-3 rounded-2xl border-2 border-verde text-verde font-bold text-sm hover:bg-verde hover:text-white transition-all duration-300 group">
                    <svg class="size-4 fill-current group-hover:-translate-x-1 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                    Volver a noticias
                </a>
            </div>
        </div>

        {{-- ══ SECCIÓN DE NOTICIAS RELACIONADAS (móvil / pie) ══ --}}
        @if ($related->isNotEmpty())
            <div class="mt-16">
                <div class="flex items-center gap-3 mb-6">
                    <span class="block h-6 w-1.5 rounded-full bg-verde"></span>
                    <h2 class="text-lg font-extrabold text-gray-800 uppercase tracking-tight">Más noticias relacionadas</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    @foreach ($related as $rel)
                        <a href="{{ route('news.show', $rel) }}" class="group block">
                            <article class="bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-md hover:border-verde/30 transition-all duration-300 h-full flex flex-col">
                                <div class="overflow-hidden h-44">
                                    <img src="{{ Storage::url($rel->image->url) }}"
                                         alt="{{ $rel->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                         loading="lazy" width="400" height="176">
                                </div>
                                <div class="p-4 flex flex-col flex-1">
                                    <span class="inline-block bg-verde/10 text-verde text-[10px] font-bold uppercase tracking-wide px-2 py-0.5 rounded-full mb-2">
                                        {{ $rel->tipo->name }}
                                    </span>
                                    <h3 class="font-bold text-gray-800 text-sm leading-snug line-clamp-2 group-hover:text-verde transition-colors flex-1">
                                        {{ $rel->title }}
                                    </h3>
                                    <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-50">
                                        <span class="text-xs text-gray-400">{{ $rel->created_at->diffForHumans() }}</span>
                                        <svg class="size-4 fill-gray-300 group-hover:fill-verde group-hover:translate-x-1 transition-all duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                                    </div>
                                </div>
                            </article>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
</x-app-layout>
