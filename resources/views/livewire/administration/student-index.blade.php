<div>
    <div class="max-w-full md:max-w-7xl mx-auto md:p-4">
        @if (session('message'))
            <div class="alert alert-success bg-verde rounded-lg text-white px-2 py-3" role="alert">
                <div><strong>Exito! </strong> {{ session('message') }}</div>
            </div>
        @endif
        <div class="card-header">
            <input wire:model.live.debounce.1000ms="search"
                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Buscar por el nombre o documento">
        </div>
        <div class="mt-4 table-responsive">
            <table class="w-full table-fixed">
                <thead>
                    <tr class="bg-gray-100">
                        <th
                            class="w-10 px-2 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            ID</th>
                        <th
                            class="px-2 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Nombre</th>
                        <th
                            class="px-2 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider hidden md:table-cell">
                            Correo</th>
                        <th
                            class="px-2 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Documento</th>
                        <th
                            class="w-20 px-2 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td class="w-10 px-2 py-4 text-left border-b border-gray-300 text-sm leading-5 font-medium">
                                {{ $student->id }}</td>
                            <td
                                class="px-2 py-4 whitespace-no-wrap text-left border-b border-gray-300 text-sm leading-5 font-medium">
                                {{ $student->name }}</td>
                            <td
                                class="px-2 py-4 whitespace-no-wrap text-left border-b border-gray-300 text-sm leading-5 font-medium hidden md:table-cell">
                                {{ $student->email }}</td>
                            <td
                                class="px-2 py-4 whitespace-no-wrap text-left border-b border-gray-300 text-sm leading-5 font-medium">
                                {{ $student->document }}</td>

                            <td
                                class="px-2 py-4 flex space-x-2 whitespace-no-wrap  border-b border-gray-300 text-sm leading-5 font-medium">
                                <a title="Editar" class=""
                                    href="{{ route('administrador.students.edit', $student) }}">
                                    <svg class="w-5 h-5 fill-green-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                    </svg>
                                </a>
                                <a title="Asignacion certificado" class=""
                                    href="{{ route('administrador.student.certificates', $student) }}">
                                    <svg class="w-5 h-5 fill-blue-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M4.1 38.2C1.4 34.2 0 29.4 0 24.6C0 11 11 0 24.6 0L133.9 0c11.2 0 21.7 5.9 27.4 15.5l68.5 114.1c-48.2 6.1-91.3 28.6-123.4 61.9L4.1 38.2zm503.7 0L405.6 191.5c-32.1-33.3-75.2-55.8-123.4-61.9L350.7 15.5C356.5 5.9 366.9 0 378.1 0L487.4 0C501 0 512 11 512 24.6c0 4.8-1.4 9.6-4.1 13.6zM80 336a176 176 0 1 1 352 0A176 176 0 1 1 80 336zm184.4-94.9c-3.4-7-13.3-7-16.8 0l-22.4 45.4c-1.4 2.8-4 4.7-7 5.1L168 298.9c-7.7 1.1-10.7 10.5-5.2 16l36.3 35.4c2.2 2.2 3.2 5.2 2.7 8.3l-8.6 49.9c-1.3 7.6 6.7 13.5 13.6 9.9l44.8-23.6c2.7-1.4 6-1.4 8.7 0l44.8 23.6c6.9 3.6 14.9-2.2 13.6-9.9l-8.6-49.9c-.5-3 .5-6.1 2.7-8.3l36.3-35.4c5.6-5.4 2.5-14.8-5.2-16l-50.1-7.3c-3-.4-5.7-2.4-7-5.1l-22.4-45.4z" />
                                    </svg>
                                </a>
                                <button title="Eliminar" type="button" wire:click="delete({{ $student }})"
                                    wire:confirm="Esta seguro de eliminar este estudiante?">
                                    <svg class="w-5 h-5 fill-red-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                    </svg>
                                </button>
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
        @if ($students->hasPages())
            <div class="mt-4">
                {{ $students->links() }}
            </div>
        @endif
    </div>

</div>
