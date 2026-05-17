<div class="space-y-8">

    {{-- ══════════ FORMULARIO DE BÚSQUEDA ══════════ --}}
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 md:px-10 pt-8 pb-6">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
                <div class="size-12 rounded-2xl flex items-center justify-center shrink-0"
                     style="background:linear-gradient(135deg,#32620e,#7ea41e)">
                    <svg class="size-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.2-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45-46.2 45c-6.3 6-8.7 15-6.5 23.4s8.9 14.9 17.3 17.1l62.5 16.2-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 16.2 62.5c2.2 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.5L256 438.6l45 46.2c6 6.3 15 8.7 23.4 6.5s14.9-8.9 17.1-17.3l16.2-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-16.2c8.4-2.2 15-8.7 17.3-17.1s-.2-17.3-6.5-23.4L460.6 256l46.2-45c6.3-6 8.7-15 6.5-23.4s-8.9-14.9-17.3-17.1l-62.5-16.2 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L343.4 18.1c-2.2-8.4-8.7-15-17.1-17.3S309 1 303 7.3L256 53.5 211 7.3zm48 136.4c54.8 0 99.2 44.4 99.2 99.2s-44.4 99.2-99.2 99.2S156.8 297.5 156.8 242.7s44.4-99.2 99.2-99.2zm0 48a51.2 51.2 0 1 0 0 102.4 51.2 51.2 0 1 0 0-102.4z"/></svg>
                </div>
                <div>
                    <h2 class="text-lg font-extrabold text-gray-800">Consultar certificado</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Ingresa tu número de cédula (10 dígitos) para verificar tus certificaciones</p>
                </div>
            </div>

            <form wire:submit.prevent="searchStudent" class="mt-6">
                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="flex-1">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                                <svg class="size-4 fill-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/></svg>
                            </div>
                            <input wire:model="search"
                                   type="number"
                                   inputmode="numeric"
                                   maxlength="10"
                                   class="w-full pl-11 pr-4 py-3.5 bg-gray-50 border rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-verde/30 focus:border-verde transition placeholder-gray-400 {{ $errors->has('search') ? 'border-red-400 bg-red-50' : 'border-gray-200' }}"
                                   placeholder="Ej: 0612345678">
                        </div>
                        @error('search')
                            <p class="text-red-500 text-xs mt-1.5 ml-1 flex items-center gap-1">
                                <svg class="size-3.5 fill-red-500 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zm-28 224a28 28 0 1 1 56 0 28 28 0 1 1 -56 0z"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Botón --}}
                    <div>
                        <button wire:loading.remove wire:target="searchStudent"
                                type="submit"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-2xl text-sm font-bold text-white transition hover:opacity-90 active:scale-95"
                                style="background:linear-gradient(135deg,#32620e,#7ea41e)">
                            <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                            Verificar
                        </button>
                        <div wire:loading wire:target="searchStudent"
                             class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-2xl text-sm font-bold text-white opacity-80 cursor-not-allowed"
                             style="background:linear-gradient(135deg,#32620e,#7ea41e)">
                            <svg class="size-4 animate-spin fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg>
                            Buscando...
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- Trust bar --}}
        <div class="px-6 md:px-10 py-3 border-t border-gray-50 flex flex-wrap items-center gap-x-6 gap-y-1"
             style="background:linear-gradient(135deg,#32620e04,#7ea41e03)">
            <span class="flex items-center gap-1.5 text-xs text-gray-400">
                <svg class="size-3.5 fill-verde" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0z"/></svg>
                Datos protegidos
            </span>
            <span class="flex items-center gap-1.5 text-xs text-gray-400">
                <svg class="size-3.5 fill-verde" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.4l0 28.1c-28.4 5.4-50 30.3-50 60.5c0 29.7 20.9 54.1 48.5 60.1L32.4 504C31.5 511 36.8 512 40 512l60 0c3.3 0 8.5-1 7.6-8L93.5 440.1C121.1 434.1 142 409.7 142 380c0-30.2-21.6-55.1-50-60.5l0-28.1c0-25.8 6.6-50.1 18.1-71.3L320 288c9.3 3.3 19.1 5 29.2 5s19.8-1.7 29.2-5l257.1-92.4c9.5-3.4 15.7-12.5 15.5-22.6s-6.7-19-16.3-22.4L343.7 36.1C336.1 33.4 328.1 32 320 32z"/></svg>
                Certificados oficiales ISTC
            </span>
            <span class="flex items-center gap-1.5 text-xs text-gray-400">
                <svg class="size-3.5 fill-verde" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                Consulta gratuita
            </span>
        </div>
    </div>

    {{-- ══════════ ÁREA DE RESULTADOS ══════════ --}}

    {{-- ── ESTADO 1: INICIAL (no se ha buscado) ── --}}
    @if (!$studentsData && !$notStudent)
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm py-16 px-6 text-center">
            <div class="max-w-sm mx-auto">
                <div class="size-20 rounded-3xl mx-auto mb-5 flex items-center justify-center"
                     style="background:linear-gradient(135deg,#32620e10,#7ea41e08)">
                    <svg class="size-10 fill-verde/40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.2-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45-46.2 45c-6.3 6-8.7 15-6.5 23.4s8.9 14.9 17.3 17.1l62.5 16.2-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 16.2 62.5c2.2 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.5L256 438.6l45 46.2c6 6.3 15 8.7 23.4 6.5s14.9-8.9 17.1-17.3l16.2-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-16.2c8.4-2.2 15-8.7 17.3-17.1s-.2-17.3-6.5-23.4L460.6 256l46.2-45c6.3-6 8.7-15 6.5-23.4s-8.9-14.9-17.3-17.1l-62.5-16.2 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L343.4 18.1c-2.2-8.4-8.7-15-17.1-17.3S309 1 303 7.3L256 53.5 211 7.3zm48 136.4c54.8 0 99.2 44.4 99.2 99.2s-44.4 99.2-99.2 99.2S156.8 297.5 156.8 242.7s44.4-99.2 99.2-99.2zm0 48a51.2 51.2 0 1 0 0 102.4 51.2 51.2 0 1 0 0-102.4z"/></svg>
                </div>
                <h3 class="text-lg font-extrabold text-gray-700 mb-2">Verifica tus certificados</h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-6">
                    Ingresa tu número de cédula en el formulario para consultar los certificados de formación continua emitidos por el IST Cumandá a tu nombre.
                </p>
                <div class="grid grid-cols-3 gap-3 text-center">
                    <div class="bg-gray-50 rounded-2xl p-3">
                        <svg class="size-6 mx-auto mb-1 fill-verdeclaro" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.4l0 28.1c-28.4 5.4-50 30.3-50 60.5c0 29.7 20.9 54.1 48.5 60.1L32.4 504C31.5 511 36.8 512 40 512l60 0c3.3 0 8.5-1 7.6-8L93.5 440.1C121.1 434.1 142 409.7 142 380c0-30.2-21.6-55.1-50-60.5l0-28.1c0-25.8 6.6-50.1 18.1-71.3L320 288c9.3 3.3 19.1 5 29.2 5s19.8-1.7 29.2-5l257.1-92.4c9.5-3.4 15.7-12.5 15.5-22.6s-6.7-19-16.3-22.4L343.7 36.1C336.1 33.4 328.1 32 320 32z"/></svg>
                        <p class="text-[10px] font-semibold text-gray-500">Cursos</p>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-3">
                        <svg class="size-6 mx-auto mb-1 fill-verdeclaro" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.2-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45-46.2 45c-6.3 6-8.7 15-6.5 23.4s8.9 14.9 17.3 17.1l62.5 16.2-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 16.2 62.5c2.2 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.5L256 438.6l45 46.2c6 6.3 15 8.7 23.4 6.5s14.9-8.9 17.1-17.3l16.2-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-16.2c8.4-2.2 15-8.7 17.3-17.1s-.2-17.3-6.5-23.4L460.6 256l46.2-45c6.3-6 8.7-15 6.5-23.4s-8.9-14.9-17.3-17.1l-62.5-16.2 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L343.4 18.1c-2.2-8.4-8.7-15-17.1-17.3S309 1 303 7.3L256 53.5 211 7.3zm48 136.4c54.8 0 99.2 44.4 99.2 99.2s-44.4 99.2-99.2 99.2S156.8 297.5 156.8 242.7s44.4-99.2 99.2-99.2zm0 48a51.2 51.2 0 1 0 0 102.4 51.2 51.2 0 1 0 0-102.4z"/></svg>
                        <p class="text-[10px] font-semibold text-gray-500">Certificados</p>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-3">
                        <svg class="size-6 mx-auto mb-1 fill-verdeclaro" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 288c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128z"/></svg>
                        <p class="text-[10px] font-semibold text-gray-500">Descarga PDF</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- ── ESTADO 2: NO ENCONTRADO ── --}}
    @if ($notStudent && !$studentsData)
        <div class="bg-white rounded-3xl border border-red-100 shadow-sm overflow-hidden">
            <div class="h-2 w-full" style="background:linear-gradient(90deg,#ef4444,#dc2626)"></div>
            <div class="p-8 md:p-12 text-center">
                <div class="size-20 rounded-3xl mx-auto mb-5 flex items-center justify-center bg-red-50">
                    <svg class="size-10 fill-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM471 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                </div>
                <h3 class="text-xl font-extrabold text-gray-800 mb-2">Estudiante no encontrado</h3>
                <p class="text-gray-500 text-sm leading-relaxed max-w-md mx-auto mb-6">
                    El número de cédula ingresado no se encuentra registrado en nuestra base de datos de certificaciones. Verifica que el número sea correcto o contáctanos.
                </p>
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl text-sm font-bold text-white transition hover:opacity-90"
                       style="background:linear-gradient(135deg,#32620e,#7ea41e)">
                        <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                        Contactar al Instituto
                    </a>
                    <button wire:click="$set('notStudent', false)"
                            class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl text-sm font-bold border-2 border-gray-200 text-gray-600 hover:border-verde hover:text-verde transition">
                        <svg class="size-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M105.1 202.6c7.7-21.8 20.2-42.3 37.8-59.8c62.5-62.5 163.8-62.5 226.3 0L386.3 160 352 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l111.5 0c17.7 0 32-14.3 32-32l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 35.2L414.4 97.6c-87.5-87.5-229.3-87.5-316.8 0C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5zM39 289.3c-5 1.5-9.8 4.2-13.7 8.2c-4 4-6.7 8.8-8.1 14c-.3 1.2-.6 2.5-.8 3.8c-.3 1.7-.4 3.4-.4 5.1L16 432c0 17.7 14.3 32 32 32s32-14.3 32-32l0-35.1 17.6 17.5c87.5 87.4 229.3 87.4 316.7 0c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.5 62.5-163.8 62.5-226.3 0l-17.5-17.5 35.1 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L73.3 288c-11.8-.1-23.4 3.8-34.3 1.3z"/></svg>
                        Intentar de nuevo
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- ── ESTADOS 3 Y 4: ESTUDIANTE ENCONTRADO ── --}}
    @if ($studentsData)
        {{-- Banner de estudiante encontrado --}}
        <div class="rounded-3xl overflow-hidden shadow-sm"
             style="background:linear-gradient(135deg,#0e1f05,#1a3a07 60%,#1f0a2e)">
            <div class="px-6 md:px-10 py-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                <div class="flex items-center gap-4">
                    <div class="size-12 rounded-2xl flex items-center justify-center text-white text-lg font-black shrink-0"
                         style="background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.2)">
                        {{ strtoupper(substr($studentsData->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-white/50 text-xs uppercase tracking-widest font-semibold">Estudiante verificado</p>
                        <h3 class="text-white font-extrabold text-base md:text-lg leading-tight">{{ $studentsData->name }}</h3>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 bg-white/10 border border-white/20 text-white/80 text-xs font-bold px-3 py-1.5 rounded-full">
                        <svg class="size-3 fill-verdeclaro" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.2-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45-46.2 45c-6.3 6-8.7 15-6.5 23.4s8.9 14.9 17.3 17.1l62.5 16.2-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 16.2 62.5c2.2 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.5L256 438.6l45 46.2c6 6.3 15 8.7 23.4 6.5s14.9-8.9 17.1-17.3l16.2-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-16.2c8.4-2.2 15-8.7 17.3-17.1s-.2-17.3-6.5-23.4L460.6 256l46.2-45c6.3-6 8.7-15 6.5-23.4s-8.9-14.9-17.3-17.1l-62.5-16.2 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L343.4 18.1c-2.2-8.4-8.7-15-17.1-17.3S309 1 303 7.3L256 53.5 211 7.3zm48 136.4c54.8 0 99.2 44.4 99.2 99.2s-44.4 99.2-99.2 99.2S156.8 297.5 156.8 242.7s44.4-99.2 99.2-99.2zm0 48a51.2 51.2 0 1 0 0 102.4 51.2 51.2 0 1 0 0-102.4z"/></svg>
                        {{ count($studentsData->certificates) }} {{ count($studentsData->certificates) == 1 ? 'certificado' : 'certificados' }}
                    </span>
                </div>
            </div>
        </div>

        {{-- ESTADO 3: Sin certificados --}}
        @if (!count($studentsData->certificates))
            <div class="bg-white rounded-3xl border border-amber-100 shadow-sm overflow-hidden">
                <div class="h-2 w-full" style="background:linear-gradient(90deg,#f59e0b,#d97706)"></div>
                <div class="p-10 text-center">
                    <div class="size-20 rounded-3xl mx-auto mb-5 flex items-center justify-center bg-amber-50">
                        <svg class="size-10 fill-amber-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zm-28 224a28 28 0 1 1 56 0 28 28 0 1 1 -56 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-gray-800 mb-2">Sin certificados registrados</h3>
                    <p class="text-gray-500 text-sm leading-relaxed max-w-md mx-auto mb-6">
                        Tu identidad fue verificada correctamente, pero aún no tienes certificados emitidos. Si crees que hay un error, contáctanos.
                    </p>
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl text-sm font-bold text-white transition hover:opacity-90"
                       style="background:linear-gradient(135deg,#e59e20,#d97706)">
                        <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                        Contactar al Instituto
                    </a>
                </div>
            </div>

        {{-- ESTADO 4: Con certificados ✓ --}}
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @foreach ($studentsData->certificates as $certificate)
                    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-md hover:border-verde/20 transition-all duration-300">

                        {{-- Cabecera del certificado --}}
                        <div class="relative px-6 pt-6 pb-10 overflow-hidden"
                             style="background:linear-gradient(135deg,#0e1f05 0%,#1a3a07 50%,#1f0a2e 100%)">
                            {{-- Orbe decorativo --}}
                            <div class="absolute top-0 right-0 w-32 h-32 rounded-full opacity-10"
                                 style="background:radial-gradient(circle,#e59e20,transparent); transform:translate(30%,-30%)"></div>
                            {{-- Patrón --}}
                            <div class="absolute inset-0 opacity-[0.04]"
                                 style="background-image:repeating-linear-gradient(45deg,#fff 0,#fff 1px,transparent 0,transparent 50%);background-size:12px 12px"></div>

                            <div class="relative flex items-start justify-between gap-2">
                                <div class="min-w-0">
                                    <span class="inline-block bg-naranja/20 border border-naranja/30 text-naranja text-[9px] font-black uppercase tracking-widest px-2.5 py-1 rounded-full mb-2">
                                        Certificado oficial
                                    </span>
                                    <h3 class="text-white font-extrabold text-base leading-snug line-clamp-2">
                                        {{ $certificate->title }}
                                    </h3>
                                    @if ($certificate->subtitle)
                                        <p class="text-white/60 text-xs mt-1 font-semibold uppercase tracking-wide">
                                            {{ $certificate->subtitle }}
                                        </p>
                                    @endif
                                </div>
                                <div class="size-10 rounded-xl shrink-0 flex items-center justify-center"
                                     style="background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.15)">
                                    <svg class="size-5 fill-naranja" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.2-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45-46.2 45c-6.3 6-8.7 15-6.5 23.4s8.9 14.9 17.3 17.1l62.5 16.2-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 16.2 62.5c2.2 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.5L256 438.6l45 46.2c6 6.3 15 8.7 23.4 6.5s14.9-8.9 17.1-17.3l16.2-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-16.2c8.4-2.2 15-8.7 17.3-17.1s-.2-17.3-6.5-23.4L460.6 256l46.2-45c6.3-6 8.7-15 6.5-23.4s-8.9-14.9-17.3-17.1l-62.5-16.2 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L343.4 18.1c-2.2-8.4-8.7-15-17.1-17.3S309 1 303 7.3L256 53.5 211 7.3zm48 136.4c54.8 0 99.2 44.4 99.2 99.2s-44.4 99.2-99.2 99.2S156.8 297.5 156.8 242.7s44.4-99.2 99.2-99.2zm0 48a51.2 51.2 0 1 0 0 102.4 51.2 51.2 0 1 0 0-102.4z"/></svg>
                                </div>
                            </div>
                        </div>

                        {{-- Cuerpo del certificado --}}
                        <div class="px-6 pt-5 pb-6 flex flex-col flex-1 -mt-4">
                            {{-- Datos en grid --}}
                            <div class="bg-gray-50 rounded-2xl p-4 grid grid-cols-2 gap-x-4 gap-y-3 mb-4">
                                <div>
                                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Período</p>
                                    <p class="text-xs font-semibold text-gray-700 mt-0.5 leading-snug">
                                        {{ $certificate->date_start->isoFormat('D MMM [de] Y') }} — {{ $certificate->date_end->isoFormat('D MMM [de] Y') }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Duración</p>
                                    <p class="text-xs font-bold text-gray-700 mt-0.5">
                                        <span class="text-verde text-sm">{{ $certificate->hours }}</span> horas
                                    </p>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Asignación</p>
                                    <p class="text-xs font-semibold text-gray-700 mt-0.5">{{ $certificate->assigned_at_formatted }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Estado</p>
                                    <span class="inline-flex items-center gap-1 text-[10px] font-bold text-verde mt-0.5">
                                        <svg class="size-3 fill-verde" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                        Emitido
                                    </span>
                                </div>
                            </div>

                            @if ($certificate->description)
                                <p class="text-gray-500 text-xs leading-relaxed mb-4 line-clamp-2">
                                    {{ $certificate->description }}
                                </p>
                            @endif

                            <div class="mt-auto">
                                <a href="{{ Storage::url($certificate->pivot->file_path) }}"
                                   target="_blank"
                                   class="flex items-center justify-center gap-2 w-full py-3 rounded-2xl text-sm font-bold text-white transition hover:opacity-90 group-hover:shadow-lg"
                                   style="background:linear-gradient(135deg,#32620e,#7ea41e)">
                                    <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                                    Ver Certificado
                                    <svg class="size-3.5 fill-white/70" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endif

</div>
