<div>
    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    @endpush

    @section('title', '- CONTÁCTANOS')
    @section('description',
        'Contáctanos en ' .
        ($settings->site_name ?? 'ISTCumanda') .
        ' para obtener más información
        sobre nuestros programas educativos y oportunidades.')
    @section('keywords',
        'contacto, educación, ' .
        ($settings->site_name ?? 'ISTCumanda') .
        ', preguntas, información,
        programas educativos')
    @section('url', route('contact'))
    @section('img',
        asset('https://images.pexels.com/photos/3779670/pexels-photo-3779670.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'))

    @section('og-tags')
        <meta property="og:url" content="{{ route('contact') }}">
        <meta property="og:type" content="article">
    @endsection

    <section id="inicio" class="pb-10">
        <div class="relative w-full h-72 md:h-96 -mt-20"><img class="absolute h-full w-full object-cover object-center"
                src="https://images.pexels.com/photos/3779670/pexels-photo-3779670.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                alt="nature image" />
            <div class="absolute inset-0 h-full w-full bg-black/50"></div>
            <div class="relative pt-28 text-center max-w-4xl mx-auto">
                <h2
                    class="block antialiased tracking-normal font-semibold leading-[1.3] text-white mb-4 text-3xl lg:text-4xl">
                    Información de Contacto</h2>
                <p class="hidden md:block antialiased text-xl font-normal leading-relaxed text-white mb-9 opacity-90">
                    Por favor, completa el siguiente formulario para ponerte en contacto con nosotros. Nos pondremos en
                    contacto contigo lo antes posible.</p>
            </div>
        </div>
        <div class="-mt-16 md:mb-8 px-4 md:px-8">
            <div class="max-w-6xl mx-auto">
                <div
                    class="py-5 md:py-10 md:px-6 flex flex-col md:flex-row justify-center rounded-xl border border-white bg-white shadow-md shadow-black/5 saturate-200">
                    {{-- DETALLES --}}
                    <div
                        class="order-last md:order-first px-4 pb-4 flex flex-col justify-center space-y-10 w-full md:w-1/2">
                        {{-- <h1 class="text-lg font-semibold uppercase">{{ $settings->site_name }}</h1> --}}
                        <div>
                            <img class="w-64 h-auto object-cover" src="{{ asset('imagenes/logo.png') }}" alt="">
                        </div>
                        @if ($settings->site_address)
                            <div class="flex space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                        d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <p class="block antialiased text-base leading-relaxed text-inherit font-bold">
                                    {{ $settings->site_address ? $settings->site_address : 'Sin direccion por el momento' }}
                                </p>
                            </div>
                        @endif
                        @if ($settings->site_phone_1 || $settings->site_phone_2)
                            <div class="flex space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                        d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <p class="block antialiased text-base leading-relaxed text-inherit font-bold">
                                    {{ $settings->site_phone_1 }} - {{ $settings->site_phone_2 }}</p>
                            </div>
                        @endif
                        @if ($settings->site_email)
                            <div class="flex space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="h-6 w-6">
                                    <path
                                        d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z">
                                    </path>
                                    <path
                                        d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z">
                                    </path>
                                </svg>
                                <div>
                                    <p class="block antialiased text-base leading-relaxed text-inherit font-bold">
                                        {{ $settings->site_email ? $settings->site_email : 'Sin correo por el momento' }}
                                    </p>
                                    <p class="block antialiased text-base leading-relaxed text-inherit font-bold">
                                        {{ $settings->site_address2 ? $settings->site_address2 : '' }}
                                    </p>
                                    <p class="block antialiased text-base leading-relaxed text-inherit font-bold">
                                        {{ $settings->site_address3 ? $settings->site_address3 : '' }}
                                    </p>
                                    <p class="block antialiased text-base leading-relaxed text-inherit font-bold">
                                        {{ $settings->site_address4 ? $settings->site_address4 : '' }}
                                    </p>
                                </div>
                            </div>
                        @endif
                        {{-- REDES SOCIALES --}}
                        @if ($settings->site_facebook || $settings->site_instagram || $settings->site_phone_1)
                            <div class="flex flex-col space-x-2">
                                <p class="block antialiased text-base leading-relaxed text-inherit font-bold">REDES
                                    SOCIALES</p>
                                <div class="flex mt-2 space-x-4">
                                    @if ($settings->site_facebook)
                                        <a title="Facebook" href="{{ $settings->site_facebook }}" target="_blank"><i
                                                class="fab fa-facebook text-black text-2xl cursor-pointer"></i></a>
                                    @endif
                                    @if ($settings->site_phone_1)
                                        @php
                                            $mensaje =
                                                'Hola ISTCumandá deseo saber mas sobre su prestigiosa institución...';
                                            $mensajeReemplazado = str_replace(' ', '%20', $mensaje);
                                        @endphp
                                        <a title="Whatsapp"
                                            href="https://api.whatsapp.com/send?phone={{ $settings->site_phone_1 }}&text={{ $mensajeReemplazado }}"
                                            target="_blank"><i
                                                class="fab fa-whatsapp text-black text-2xl cursor-pointer"></i></a>
                                    @endif
                                    @if ($settings->site_instagram)
                                        <a title="Instagram" href="{{ $settings->site_instagram }}" target="_blank">
                                            <svg class="size-6 fill-black" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                            </svg>
                                        </a>
                                    @endif
                                    @if ($settings->site_tiktok)
                                        <a title="Tiktok" href="{{ $settings->site_tiktok }}" target="_blank"
                                            class="mt-0.5">
                                            <svg class="size-5 fill-black" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>

                        @endif
                    </div>
                    {{-- FORMULARIO --}}
                    <div class="order-first md:order-last mb-10 md:mb-0 md:py-4 px-4 w-full md:w-1/2">
                        <header class="text-center pb-4">
                            <h1 class="text-inherit text-xl uppercase font-semibold">Formulario de Contacto</h1>
                            <p class="block md:hidden text-inherit text-base py-2">Envíanos tus datos y un consultor te
                                brindará toda la información
                                sobre
                                los beneficios que el instituto te ofrece para obtener tu carrera Tecnológica Superior
                                en poco tiempo.
                            </p>
                        </header>
                        <form wire:submit="envioFormulario">
                            <div class="mb-4">
                                <div class="relative w-full min-w-[200px] h-11">
                                    <input wire:model="name" type="text" name="name"
                                        class="peer w-full h-full focus:outline-none focus:ring-1 focus:ring-transparent bg-transparent text-gray-700 font-normal outline outline-0 focus:outline-0 disabled:bg-gray-50 disabled:border-0 disabled:cursor-not-allowed transition-all placeholder-shown:border placeholder-shown:border-gray-200 placeholder-shown:border-t-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent placeholder:opacity-0 focus:placeholder:opacity-100 text-sm px-3 py-3 rounded-md border-gray-200 focus:border-gray-900"
                                        placeholder=" " />
                                    <label
                                        class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-gray-500 peer-focus:text-gray-900 before:border-gray-200 peer-focus:before:!border-gray-900 after:border-gray-200 peer-focus:after:!border-gray-900">Ingrese
                                        sus nombres completos </label>
                                </div>
                                @error('name')
                                    <span class="error text-red-600 py-2 text-sm ml-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <div class="relative w-full min-w-[200px] h-11">
                                    <input wire:model="email" autocomplete="email" type="email" name="email"
                                        class="peer w-full h-full focus:outline-none focus:ring-1 focus:ring-transparent bg-transparent text-gray-700 font-normal outline outline-0 focus:outline-0 disabled:bg-gray-50 disabled:border-0 disabled:cursor-not-allowed transition-all placeholder-shown:border placeholder-shown:border-gray-200 placeholder-shown:border-t-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent placeholder:opacity-0 focus:placeholder:opacity-100 text-sm px-3 py-3 rounded-md border-gray-200 focus:border-gray-900"
                                        placeholder=" " />
                                    <label
                                        class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-gray-500 peer-focus:text-gray-900 before:border-gray-200 peer-focus:before:!border-gray-900 after:border-gray-200 peer-focus:after:!border-gray-900">Ingrese
                                        su correo </label>
                                </div>
                                @error('email')
                                    <span class="error text-red-600 py-2 text-sm ml-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <div class="relative w-full min-w-[200px] h-11">
                                    <input wire:model="phone" autocomplete="mobile" type="tel" name="phone"
                                        class="peer w-full h-full focus:outline-none focus:ring-1 focus:ring-transparent bg-transparent text-gray-700 font-normal outline outline-0 focus:outline-0 disabled:bg-gray-50 disabled:border-0 disabled:cursor-not-allowed transition-all placeholder-shown:border placeholder-shown:border-gray-200 placeholder-shown:border-t-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent placeholder:opacity-0 focus:placeholder:opacity-100 text-sm px-3 py-3 rounded-md border-gray-200 focus:border-gray-900"
                                        placeholder=" " />
                                    <label
                                        class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-gray-500 peer-focus:text-gray-900 before:border-gray-200 peer-focus:before:!border-gray-900 after:border-gray-200 peer-focus:after:!border-gray-900">Ingrese
                                        su número de celular </label>
                                </div>
                                @error('phone')
                                    <span class="error text-red-600 py-2 text-sm ml-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <div class="relative w-full min-w-[200px] h-11">
                                    <input wire:model="document" type="number" name="document"
                                        class="peer w-full h-full focus:outline-none focus:ring-1 focus:ring-transparent bg-transparent text-gray-700 font-normal outline outline-0 focus:outline-0 disabled:bg-gray-50 disabled:border-0 disabled:cursor-not-allowed transition-all placeholder-shown:border placeholder-shown:border-gray-200 placeholder-shown:border-t-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent placeholder:opacity-0 focus:placeholder:opacity-100 text-sm px-3 py-3 rounded-md border-gray-200 focus:border-gray-900"
                                        placeholder=" " />
                                    <label
                                        class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-gray-500 peer-focus:text-gray-900 before:border-gray-200 peer-focus:before:!border-gray-900 after:border-gray-200 peer-focus:after:!border-gray-900">Ingrese
                                        su número de cédula </label>
                                </div>
                                @error('document')
                                    <span class="error text-red-600 py-2 text-sm ml-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <div class="relative w-full min-w-[200px] h-11">
                                    <select wire:model.live="tecnologia" required
                                        class="w-full h-full  focus:outline-none focus:ring-1 focus:ring-transparent bg-transparent font-normal outline outline-0 focus:outline-0 disabled:bg-gray-50 disabled:border-0 disabled:cursor-not-allowed transition-all placeholder-shown:border placeholder-shown:border-gray-200 placeholder-shown:border-t-gray-200 border focus:border-2 text-gray-500 placeholder:opacity-0 focus:placeholder:opacity-100 text-sm px-3 py-3 rounded-md border-gray-200 focus:border-gray-900">
                                        <option value="">Seleccione una tecnología</option>
                                        @foreach ($tecnologias as $tecnologia)
                                            <option class="text-base text-zinc-800" value="{{ $tecnologia->title }}">
                                                {{ $tecnologia->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tecnologia')
                                    <span class="error text-red-600 py-2 text-sm ml-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <div class="relative w-full min-w-[200px] h-20">
                                    <input wire:model="description" type="textarea" name="description"
                                        class="peer w-full h-full bg-transparent text-gray-700 font-normal outline outline-0 focus:outline-0 disabled:bg-gray-50 disabled:border-0 disabled:cursor-not-allowed transition-all placeholder-shown:border placeholder-shown:border-gray-200 placeholder-shown:border-t-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent placeholder:opacity-0 focus:placeholder:opacity-100 text-sm px-3 py-3 rounded-md border-gray-200 focus:border-gray-900"
                                        placeholder=" " />
                                    <label
                                        class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-gray-500 peer-focus:text-gray-900 before:border-gray-200 peer-focus:before:!border-gray-900 after:border-gray-200 peer-focus:after:!border-gray-900">Ingrese
                                        su mensaje </label>
                                </div>
                                @error('description')
                                    <span class="error text-red-600 py-2 text-sm ml-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" wire:target="envioFormulario" wire:loading.remove
                                class="align-middle select-none font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-naranja text-white hover:bg-neutral-800 shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none block w-full mt-6"
                                type="button">
                                Contactanos
                            </button>
                            <div class="flex justify-center">
                                <div wire:loading wire:target="envioFormulario">
                                    <label class="text-inherit text-base flex items-center">Procesando los datos ...
                                        <svg class="animate-spin flex items-center ml-2 mr-3 h-5 w-5 text-inherit"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                    </label>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div wire:ignore
            class="container group relative h-96 mx-auto rounded-xl border border-white shadow-md shadow-black/5 saturate-200 mb-4 overflow-hidden mt-4">
            <div style="height: 100%" class="w-full h-full z-20" id="map"></div>
        </div>
    </section>
    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script>
            var map = L.map('map').setView([-2.208681, -79.132267], 16);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy;  ISTCumandá <a href="https://maps.app.goo.gl/QLxkBgFz7hnuNLQK6">Como llegar</a>'
            }).addTo(map);

            L.marker([-2.208681, -79.132267]).addTo(map)
                .bindPopup('ISTCumandá')
                .openPopup();
        </script>

        <script>
            /*  document.addEventListener('livewire:init', () => {
                                                                                                        Livewire.on('alert', (eventData) => {
                                                                                                            console.log('Datos recibidos:', eventData);
                                                                                                            const data = eventData[0];
                                                                                                            Swal.fire({
                                                                                                                title: data.title,
                                                                                                                text: data.message,
                                                                                                                icon: data.type
                                                                                                            });
                                                                                                        });
                                                                                                    }); */
        </script>
    @endpush

</div>
