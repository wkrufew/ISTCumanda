<div>
    {{-- ── BARRA DE BÚSQUEDA ── --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
        <div class="relative w-full sm:max-w-md">
            <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                <svg class="size-4 fill-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            </div>
            <input wire:model.live.debounce.500ms="search" type="search"
                   class="w-full pl-11 pr-4 py-3 bg-white border border-gray-200 rounded-2xl shadow-sm focus:outline-none focus:ring-2 focus:ring-verde/30 focus:border-verde text-sm placeholder-gray-400 transition"
                   placeholder="Buscar documento por título o descripción...">
        </div>
        <div class="flex items-center gap-2 text-sm text-gray-500 shrink-0">
            <svg class="size-4 fill-verde" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 288c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128z"/></svg>
            <span><strong class="text-gray-800 font-bold">{{ $documents->total() }}</strong> documentos</span>
        </div>
    </div>

    {{-- ── GRID + MODAL ── --}}
    <div x-data="{ openModal: false }"
         x-on:open-modal.window="openModal = true"
         @keydown.window.escape="openModal = false"
         x-on:close-modal.window="openModal = false"
         class="relative">

        {{-- Loading overlay --}}
        <div wire:loading.flex wire:target="search"
             class="absolute inset-0 bg-gray-50/80 backdrop-blur-sm z-10 items-center justify-center rounded-2xl">
            <svg class="animate-spin size-8 text-verde" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>

        {{-- Grid de cards --}}
        @if ($documents->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($documents as $document)
                    <div wire:key="{{ $document->id }}"
                         class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-verde/20 transition-all duration-300 overflow-hidden flex flex-col">

                        {{-- Cabecera visual PDF --}}
                        <div class="relative h-32 flex flex-col items-center justify-center overflow-hidden"
                             style="background: linear-gradient(135deg, #0e1f0508 0%, #32620e10 50%, #7ea41e0a 100%)">
                            <div class="absolute inset-0 opacity-5"
                                 style="background-image: repeating-linear-gradient(45deg, #32620e 0, #32620e 1px, transparent 0, transparent 50%); background-size: 10px 10px;"></div>
                            <svg class="size-14 relative z-10" style="fill:#dc2626cc" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg>
                            <span class="relative z-10 text-[10px] font-black text-red-600/60 uppercase tracking-widest mt-1">PDF</span>
                        </div>

                        {{-- Contenido --}}
                        <div class="p-5 flex flex-col flex-1">
                            <div class="flex-1">
                                <h3 class="font-extrabold text-gray-800 text-sm uppercase leading-snug line-clamp-3 group-hover:text-verde transition-colors duration-200">
                                    {{ $document->title }}
                                </h3>
                                @if ($document->description)
                                    <p class="text-gray-500 text-xs mt-2 line-clamp-2 leading-relaxed">
                                        {{ $document->description }}
                                    </p>
                                @endif
                            </div>

                            @isset($document->file)
                                <div class="mt-4 pt-4 border-t border-gray-50 grid grid-cols-2 gap-2">
                                    {{-- Visualizar --}}
                                    <button wire:click="preview({{ $document->id }})"
                                        class="flex items-center justify-center gap-1.5 py-2.5 rounded-xl text-xs font-bold text-azul bg-azul/5 hover:bg-azul hover:text-white border border-azul/20 transition-all duration-200">
                                        <svg class="size-3.5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                                        Visualizar
                                    </button>

                                    {{-- Descargar --}}
                                    <div x-data="{ loading: false }">
                                        <button
                                            x-on:click="loading = true; setTimeout(() => loading = false, 2500)"
                                            wire:click="download({{ $document->id }})"
                                            :disabled="loading"
                                            :class="loading ? 'opacity-60 cursor-not-allowed bg-morado text-white' : 'text-morado bg-morado/5 hover:bg-morado hover:text-white border-morado/20'"
                                            class="w-full flex items-center justify-center gap-1.5 py-2.5 rounded-xl text-xs font-bold border transition-all duration-200">
                                            <template x-if="!loading">
                                                <svg class="size-3.5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM216 232l0 102.1 31-31c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-72 72c-9.4 9.4-24.6 9.4-33.9 0l-72-72c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l31 31L168 232c0-13.3 10.7-24 24-24s24 10.7 24 24z"/></svg>
                                            </template>
                                            <template x-if="loading">
                                                <svg class="size-3.5 animate-spin fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg>
                                            </template>
                                            <span x-text="loading ? 'Descargando...' : 'Descargar'"></span>
                                        </button>
                                    </div>
                                </div>
                            @endisset
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="py-20 text-center bg-white rounded-2xl border border-gray-100">
                <svg class="mx-auto mb-3 size-14 fill-gray-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                <p class="text-gray-400 font-semibold text-sm">No se encontraron documentos</p>
                @if ($search)
                    <p class="text-gray-400 text-xs mt-1">para "<em>{{ $search }}</em>"</p>
                @endif
            </div>
        @endif

        {{-- Paginación --}}
        @if ($documents->hasPages())
            <div class="mt-8 flex justify-center">
                {{ $documents->links() }}
            </div>
        @endif

        {{-- ══ MODAL PREVIEW ══ --}}
        <div x-show="openModal"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center p-4"
             style="display:none">

            {{-- Backdrop --}}
            <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" @click="openModal = false; $wire.set('selectedDocument', null)"></div>

            {{-- Panel --}}
            <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-4xl max-h-[90vh] flex flex-col overflow-hidden"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95">

                @if ($selectedDocument)
                    {{-- Header --}}
                    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 shrink-0"
                         style="background: linear-gradient(135deg, #32620e08, #7ea41e06)">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="size-9 rounded-xl flex items-center justify-center shrink-0"
                                 style="background:linear-gradient(135deg,#dc262620,#dc262610)">
                                <svg class="size-5 fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 288c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128z"/></svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-widest">Documento</p>
                                <h3 class="font-extrabold text-gray-800 text-sm uppercase truncate">{{ $selectedDocument->title }}</h3>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <a href="{{ asset('storage/' . $selectedDocument->file) }}"
                               download
                               class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold text-morado bg-morado/5 hover:bg-morado hover:text-white border border-morado/20 transition-all duration-200">
                                <svg class="size-3.5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM216 232l0 102.1 31-31c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-72 72c-9.4 9.4-24.6 9.4-33.9 0l-72-72c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l31 31L168 232c0-13.3 10.7-24 24-24s24 10.7 24 24z"/></svg>
                                Descargar
                            </a>
                            <button @click="openModal = false; $wire.set('selectedDocument', null)"
                                    class="size-8 flex items-center justify-center rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-500 hover:text-gray-700 transition">
                                <svg class="size-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                            </button>
                        </div>
                    </div>

                    {{-- iframe PDF --}}
                    <div class="flex-1 overflow-hidden">
                        <iframe src="{{ asset('storage/' . $selectedDocument->file) }}"
                                class="w-full h-full min-h-[500px] border-0"
                                title="{{ $selectedDocument->title }}">
                        </iframe>
                    </div>
                @else
                    <div class="flex items-center justify-center h-64">
                        <svg class="animate-spin size-8 text-verde" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('js')
        <script>
            window.addEventListener('start-download', event => {
                const url = Array.isArray(event.detail) ? event.detail[0] : event.detail;
                setTimeout(() => {
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = '';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                }, 1500);
            });
        </script>
    @endpush
</div>
