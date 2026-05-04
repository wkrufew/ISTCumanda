<div>
    @if (session('notificacion'))
        <div class="alert alert-success" role="alert">
            <strong>Exito!</strong>{{ session('notificacion') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="max-w-7xl mx-auto p-6 rounded-lg bg-white">
        <div class="card-header">
            <input wire:model.live="search"
                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50{{ $errors->has('name') ? ' border-red-500' : '' }}"
                placeholder="Buscar por el nombre o correo">
        </div>
        <div class="mt-4 table-responsive">
            <table class="w-full table-fixed bg-white">
                <thead>
                    <tr class="bg-gray-100">
                        <th
                            class="w-2 px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            ID</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Nombres</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Correo</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-center text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Cedula/Telefono</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-center text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Curso/Periodo</th>
                        <th
                            class="w-24 px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inscritos as $inscrito)
                        <tr>
                            <td class="w-3 px-6 py-4 text-left border-b border-gray-300 text-sm leading-5 font-medium">
                                {{ $inscrito->id }}</td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap text-left border-b border-gray-300 text-sm leading-5 font-medium">
                                {{ $inscrito->nombre }} {{ $inscrito->apellido }}</td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap text-left border-b border-gray-300 text-sm leading-5 font-medium">
                                {{ $inscrito->correo }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap text-left border-b border-gray-300 text-sm leading-5 font-medium">
                                {{ $inscrito->cedula }} <br>
                                <span class="hover:underline">
                                    <a class="hover:underline"
                                        href="tel:{{ $inscrito->telefono }}">{{ $inscrito->telefono }}</a>
                                </span>
                            </td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap text-left border-b border-gray-300 text-xs leading-5 font-medium">
                                {{ $inscrito->course->title }} <br>
                                {{ $inscrito->period->nombre }}

                            </td>


                            <td class="px-6 py-4 whitespace-no-wrap text-center border-b border-gray-300 text-sm leading-5 font-medium"
                                width="10px">
                                <div class="flex items-center space-x-3">
                                    <a class="" href="{{ route('administrador.users.edit', $inscrito) }}">
                                        <svg class="w-5 h-5 fill-green-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                        </svg>
                                    </a>
                                    <button type="button" {{-- wire:click="delete" --}}
                                        wire:confirm="Esta seguro de querer eliminar el inscrito?"
                                        wire:click="delete( {{ $inscrito->id }} )" class="">
                                        <svg class="size-5 fill-red-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                    </button>
                                </div>
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
        @if ($inscritos->hasPages())
            <div class="mt-4">
                {{ $inscritos->links() }}
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
