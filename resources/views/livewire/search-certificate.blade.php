<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    <div class="rounded-md">
        <div class="sticky top-20 p-4 rounded-md border border-verde border-dashed shadow-md">
            <h2 class="text-center text-md font-semibold text-black">Formulario de consulta</h2>
            <div class="mt-4">
                <label for="codigo" class="block">Ingrese el número de documento</label>
                <form wire:submit.prevent="searchStudent">
                    <div class="card-header">
                        <input wire:model="search"
                            class="mt-1 block w-full rounded-full shadow-sm border-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50{{ $errors->has('search') ? ' border-red-500' : '' }}"
                            placeholder="Buscar por el numero de documento">
                        @error('search')
                            <span class="error text-red-600 py-2 text-sm mt-1 ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-center mt-4">
                        <div wire:loading wire:target="searchStudent">
                            <label class="text-gray-700 text-sm flex items-center">Recopilando datos ...
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
                        <button wire:target="searchStudent" wire:loading.remove type="submit"
                            class="px-4 py-2 bg-black text-gray-100 rounded-full text-sm">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="md:col-span-3">
        @if ($studentsData)
            <div class="rounded-md p-2 md:p-4">
                <h2 class="mb-2 md:mb-4 md:text-lg font-semibold text-center">Resultado de la consulta para:
                    {{ $studentsData->name }}</h2>
                @if (count($studentsData->certificates))
                    <ul
                        class="{{ count($studentsData->certificates) > 1 ? 'grid grid-cols-1 md:grid-cols-2 gap-4' : 'w-full md:w-2/3 mx-auto' }}">
                        @foreach ($studentsData->certificates as $certificate)
                            <li class="text-sm bg-white border border-dashed border-verde p-3 rounded-md shadow-md">
                                <div class="flex items-center">
                                    <div class="flex-1 items-center">
                                        <h2 class="font-semibold text-xl">{{ $certificate->title }}</h2>
                                    </div>
                                    <div class="w-auto">
                                        <a class="inline-flex bg-green-600 fill-white rounded-full px-3 py-2 shadow-md transform hover:-translate-y-0.5 transition-all hover:border-b-2 border-green-800"
                                            href="{{ Storage::url($certificate->pivot->file_path) }}" target="_blank">
                                            <span class="text-xs text-white font-medium mr-1">Ver Certificado</span>
                                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                                            </svg>

                                        </a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 mt-2">
                                    <div class="flex-col justify-center text-sm">
                                        <div>
                                            <b>Modalidad:</b> {{ $certificate->subtitle }}
                                        </div>
                                        <div>
                                            <b>Periodo:</b> Del {{ $certificate->date_start->isoFormat('D [de] MMMM') }}
                                            al {{ $certificate->date_end->isoFormat('D [de] MMMM [de] Y') }}
                                        </div>
                                        <div>
                                            <b>Duración:</b> {{ $certificate->hours }} h.
                                        </div>
                                        <div>
                                            <b>Asignación:</b>
                                            {{ $certificate->assigned_at_formatted }}
                                        </div>
                                    </div>
                                    <p class="md:ml-2 mt-2 md:mt-0">
                                        {{ $certificate->description }} {{-- Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Aperiam cupiditate, id perferendis sed, voluptates quidem
                                        explicabo eveniet similique unde sapiente illum esse culpa, veritatis. --}}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div
                        class="w-full md:h-96 md:border md:border-dashed md:border-verde md:shadow-md md:rounded-md md:p-4 flex flex-col justify-center items-center">
                        <div id="alert-4"
                            class="flex items-center p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">
                                El estudiante no cuenta con certificaciones por el momento, contactate con nosotros en
                                caso de haber algun problema, <a href="#"
                                    class="font-semibold underline hover:no-underline">Click Aqui</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @else
            <div class="">
                <div
                    class="w-full md:h-96 md:border md:border-dashed md:border-verde md:shadow-md md:rounded-md md:p-4 flex flex-col justify-center items-center">
                    @if ($notStudent)
                        <div id="alert-2"
                            class="flex items-center p-4 md:mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">
                                Lo sentimos el estudiante no consta en nuestra base de datos de certificaciones <a
                                    href="#" class="font-semibold underline hover:no-underline">contactanos</a>.
                            </div>
                        </div>
                    @else
                        <div id="alert-5" class="flex items-center p-4 rounded-lg bg-gray-50 dark:bg-black"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4 dark:text-gray-300" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium text-black dark:text-gray-300">
                                AQUI SE MOSTRARAN LOS DATOS EN CASO DE POSEER CERTIFICADOS
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
