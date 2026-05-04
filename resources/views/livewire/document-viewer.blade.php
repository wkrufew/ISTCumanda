<div>
    <div class="container overflow-hidden">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div x-data="{ openModal: false }" x-on:open-modal.window="openModal = true"
                        @keydown.window.escape="openModal = false" x-on:close-modal.window="openModal = false"
                        class="overflow-hidden max-w-3xl mx-auto px-0 md:px-8 py-4 md:bg-gray-100 md:shadow-md md:rounded-lg md:border md:border-gray-100 mt-6">


                        <div>
                            <h2 class="text-xl text-center font-semibold">LISTADO DE DOCUMENTOS LEGALES DEL
                                INSTITUTO</h2>
                        </div>

                        <div class="py-4 flex ">
                            <input wire:model.live.debounce.500ms="search" type="search"
                                class="form-input flex-1 shadow-lg  rounded-full"
                                placeholder="Escriba el titulo del documento a buscar...">
                        </div>

                        <hr>
                        @if ($documents->count())
                            <div class="">
                                <div class="space-y-4 mt-4 pb-4">
                                    @forelse ($documents as $document)
                                        <div
                                            class="flex items-center justify-between select-none space-x-2 mb-4 w-full bg-white shadow-md rounded-lg p-2 md:p-4 hover:bg-verdeclaro/30 transition-colors border border-gray-200 pb-6">

                                            <div class="flex items-center space-x-1">
                                                @isset($document->file)
                                                    <svg class="size-8 fill-red-700 shrink-0 hidden md:block"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                                                    </svg>
                                                @else
                                                @endisset
                                                <div>
                                                    <span class="text-gray-800 font-semibold uppercase text-sm">
                                                        {{ $document->title }}
                                                    </span>
                                                    <p class="text-gray-600 text-sm mt-1">
                                                        {{ $document->description ?? 'No hay descripción disponible.' }}

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-4">
                                                <button class="hidden md:block"
                                                    wire:click="preview({{ $document->id }})">
                                                    <svg class="size-6 fill-azul" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 576 512">
                                                        <path
                                                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                                    </svg>
                                                </button>
                                                <div x-data="{ downloading: false }" class="flex items-center">
                                                    <button
                                                        x-on:click="downloading = true; setTimeout(() => { downloading = false }, 2000)"
                                                        wire:click="download({{ $document->id }})"
                                                        class=" disabled:opacity-50" :disabled="downloading">
                                                        <template x-if="downloading">
                                                            <span class="text-xs font-medium">
                                                                <svg class="mr-3 -ml-1 size-5 animate-spin text-morado"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <circle class="opacity-25" cx="12"
                                                                        cy="12" r="10" stroke="currentColor"
                                                                        stroke-width="4"></circle>
                                                                    <path class="opacity-75" fill="currentColor"
                                                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </template>
                                                        <template x-if="!downloading">
                                                            <svg class="size-8 md:size-6 fill-morado" title="Descargar"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 384 512">
                                                                <path
                                                                    d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM216 232l0 102.1 31-31c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-72 72c-9.4 9.4-24.6 9.4-33.9 0l-72-72c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l31 31L168 232c0-13.3 10.7-24 24-24s24 10.7 24 24z" />
                                                            </svg>
                                                        </template>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div>
                                            <p class="text-gray-500 text-center">No se encontraron documentos.
                                            </p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                            @if ($documents->hasPages())
                                <div class="px-6 py-4">
                                    {{ $documents->links() }}
                                </div>
                            @endif

                            {{-- Modal --}}
                            <div x-show="openModal"
                                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                                x-transition>
                                <div @click.away="openModal = false"
                                    class="bg-white rounded-lg shadow-lg w-full max-w-3xl p-6 relative h-[600px]">

                                    @if ($selectedDocument)
                                        <div class="flex items-center justify-between  mb-4">
                                            <h3 class="text-xl font-bold">{{ $selectedDocument->title }}</h3>
                                            <button class="hover:text-black text-2xl text-verde font-bold"
                                                @click="openModal = false"> x
                                            </button>
                                        </div>

                                        <iframe height="550" src="{{ asset('storage/' . $selectedDocument->file) }}"
                                            class="w-full h-[500px]" frameborder="0"></iframe>
                                    @else
                                        <p class="text-gray-500">Cargando documento...</p>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="px-6 py-4">
                                No se encuentrarón registros.
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('js')
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('alert', (eventData) => {

                    const data = eventData[0];

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: data.type,
                        title: data.message,
                    });
                });
            });

            window.addEventListener('start-download', event => {
                const url = event.detail;

                // Espera 2 segundos antes de descargar
                setTimeout(() => {
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = '';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                }, 2000);
            });
        </script>
    @endpush
</div>
