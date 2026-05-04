<div>
    <div class="max-w-7xl mx-auto p-4">
        <div class="card-header">
            <input wire:model.live.debounce.1000ms="search"
                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50{{ $errors->has('title') ? ' border-red-500' : '' }}"
                placeholder="Buscar por el titulo">
        </div>
        <div class="mt-4 table-responsive">
            <table class="w-full table-fixed">
                <thead>
                    <tr class="bg-gray-100">
                        <th
                            class="w-2 px-3 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            ID</th>
                        <th
                            class="px-3 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Codigo</th>
                        <th
                            class="px-3 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Titulo</th>
                        <th
                            class="px-3 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider hidden md:table-cell">
                            Periodo</th>
                        <th
                            class="w-32 px-3 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider hidden md:table-cell">
                            Horas</th>
                        <th
                            class="w-32 px-3 py-3 shrink-0 border-b-2 border-gray-300 text-right text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Estado</th>
                        <th
                            class="w-24 px-3 py-3 border-b-2 border-gray-300 text-right text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($certificates as $certificate)
                        <tr>
                            <td class="w-3 px-3 py-1 text-left border-b border-gray-300 text-sm leading-5 font-medium">
                                {{ $certificate->id }}</td>
                            <td
                                class="px-3 py-1 whitespace-no-wrap text-left border-b border-gray-300 text-sm leading-5 font-medium">
                                {{ $certificate->code }}</td>
                            <td
                                class="px-3 py-1 whitespace-no-wrap text-left border-b border-gray-300 text-sm leading-5 font-medium">
                                {{ $certificate->title }}</td>
                            <td
                                class="px-3 py-1 whitespace-no-wrap text-left border-b border-gray-300 text-sm leading-5 font-medium hidden md:table-cell">
                                Del {{ $certificate->date_start->isoFormat('D [de] MMMM [de] Y') }} <br>
                                al {{ $certificate->date_end->isoFormat('D [de] MMMM [de] Y') }}</td>
                            <td
                                class="px-3 py-1 whitespace-no-wrap text-left border-b border-gray-300 text-sm leading-5 font-medium hidden md:table-cell">
                                {{ $certificate->hours }} h.</td>
                            <td
                                class="px-3 py-1 shrink-0 text-right border-b border-gray-300 text-sm leading-5 font-medium">
                                <div>
                                    @if ($certificate->isActive)
                                        <span
                                            class="px-2  text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Activo</span>
                                    @else
                                        <span
                                            class="px-2  text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Inactivo</span>
                                    @endif
                                </div>
                                <label class="relative inline-flex cursor-pointer items-center mt-1">
                                    <input id="switch" type="checkbox" class="peer sr-only"
                                        id="switch-{{ $certificate->id }}"
                                        @if ($certificate->isActive) checked @endif
                                        wire:click="toggleStatus({{ $certificate }})" />
                                    <label for="switch" class="hidden"></label>
                                    <div
                                        class="peer h-6 w-11 rounded-full border bg-slate-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300
                                        after:bg-white after:transition-all after:content-[''] peer-checked:bg-green-600
                                        peer-checked:after:translate-x-full peer-checked:after:border-white
                                        peer-focus:ring-green-300">

                                    </div>
                                </label>
                            </td>
                            <td
                                class="px-6 py-1 whitespace-no-wrap text-right border-b border-gray-300 text-sm leading-5 font-medium">
                                <a class="flex justify-center items-center"
                                    href="{{ route('administrador.certificates.edit', $certificate) }}">
                                    <svg class="w-auto
                                    h-5 fill-green-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path
                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                    </svg>
                                </a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No existe registro que coincida con el parametro de busqueda</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        @if ($certificates->hasPages())
            <div class="mt-4">
                {{ $certificates->links() }}
            </div>
        @endif
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
        </script>
    @endpush
</div>
