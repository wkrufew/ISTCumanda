<section class="bg-verde relative h-full rounded-tr-3xl">
    <div class="relative w-full h-full">
        <div class="absolute bg-verdeclaro w-full md:w-11/12 -left-56 -top-10  h-full rounded-3xl"></div>
        <div class="relative rounded-t-3xl rounded-tl-none bg-verde h-full">
            <div class="py-8 max-w-6xl mx-auto h-full">
                <div class="px-10 grid grid-cols-1 gap-2 md:grid-cols-3 md:gap-1">
                    <div class="">
                        <h2 class="text-lg text-white font-semibold text-center py-2">{{ $settings->site_name }}</h2>
                        <p class="text-sm text-zinc-100 text-center">
                            {{ $settings->footer_text }}
                        </p>
                        {{-- <img loading="lazy" class="w-40 object-cover bg-cover h-36 rounded-lg mt-7 mx-auto"
                            src="{{ asset('imagenes/IST_LOGO.webp') }}" alt="portada"> --}}
                    </div>
                    <div class="px-6">
                        <h2 class="text-lg text-white font-semibold text-center py-2">Contacto</h2>
                        <div class="ml-2 space-y-1">
                            <div class="text-sm text-zinc-100"><i class="fa fa-phone transform rotate-90 mr-2"
                                    aria-hidden="true"></i>
                                <a class="hover:underline"
                                    href="tel:{{ $settings->site_phone_1 }}">{{ $settings->site_phone_1 }}</a> -
                                <a class="hover:underline"
                                    href="tel:{{ $settings->site_phone_2 }}">{{ $settings->site_phone_2 }}</a>
                            </div>
                            <div class="text-sm text-zinc-100">
                                <div class="flex gap-2">
                                    <div>
                                        <i class="fa fa-envelope mr-2" aria-hidden="true"></i>
                                    </div>
                                    <div>
                                        @if ($settings->site_email)
                                            <a class="hover:underline"
                                                href="mailto:{{ $settings->site_email }}">{{ $settings->site_email }}</a>
                                        @endif
                                        @if ($settings->site_address2)
                                            <a class="hover:underline"
                                                href="mailto:{{ $settings->site_address2 }}">{{ $settings->site_address2 }}</a>
                                        @endif
                                        @if ($settings->site_address3)
                                            <a class="hover:underline"
                                                href="mailto:{{ $settings->site_address3 }}">{{ $settings->site_address3 }}</a>
                                        @endif
                                        @if ($settings->site_address4)
                                            <a class="hover:underline"
                                                href="mailto:{{ $settings->site_address4 }}">{{ $settings->site_address4 }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm text-zinc-100 flex">
                                <svg class="w-5 h-5 fill-zinc-100 mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                                </svg>
                                <a href="https://maps.app.goo.gl/HjN6LeTWFhoZAj2m9" target="_blank"
                                    rel="noopener noreferrer">{{ $settings->site_address }}</a>
                            </div>
                        </div>
                        {{-- <div class="w-full mx-auto mt-3">
                                <div class="w-full mx-auto rounded-lg" id="map"></div>
                        </div> --}}
                    </div>
                    @if ($settings->site_facebook || $settings->site_instagram || $settings->site_phone_1)
                        <div class="mx-6">
                            <h2 class="text-lg text-white font-semibold text-center py-2">Redes Sociales</h2>
                            <div class="flex justify-center space-x-4">
                                @if ($settings->site_facebook)
                                    <a title="Facebook" href="{{ $settings->site_facebook }}" target="_blank"><i
                                            class="fab fa-facebook text-white text-2xl cursor-pointer"></i></a>
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
                                            class="fab fa-whatsapp text-white text-2xl cursor-pointer"></i>
                                    </a>
                                @endif
                                @if ($settings->site_instagram)
                                    <a title="Instagram" href="{{ $settings->site_instagram }}" target="_blank">
                                        <svg class="size-6 fill-white" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                        </svg>
                                    </a>
                                @endif
                                @if ($settings->site_tiktok)
                                    <a title="Instagram" href="{{ $settings->site_tiktok }}" target="_blank"
                                        class="mt-0.5">
                                        <svg class="size-5 fill-white" xmlns="http://www.w3.org/2000/svg"
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
            </div>
            <div class="max-w-7xl mx-auto flex justify-around text-zinc-100 text-sm py-3 px-2">
                <h3>Copyright © {{ date('Y') }} Todos los derechos reservador por ISTCumandá</h3>
                <h3>Creado por: <a href="https://wa.me/qr/5ZREYBH5NWNCJ1" class="text-white">Ing. Smith
                        Aviles</a></h3>
            </div>
        </div>
    </div>
</section>
{{-- <script>
     var map = L.map('map').setView([-2.208681, -79.132267], 15);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy;  ISTCumandá <a href="https://maps.app.goo.gl/QLxkBgFz7hnuNLQK6">Como llegar</a>'
    }).addTo(map);

    L.marker([-2.208681, -79.132267]).addTo(map)
        .bindPopup('ISTCumandá')
        .openPopup();
</script> --}}
