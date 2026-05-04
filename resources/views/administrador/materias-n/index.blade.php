<x-administrador-layout>
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Materias - Acta de Calificaciones</h2>
            <a href="{{ route('administrador.materias.create') }}"
                class="inline-block bg-verde text-white px-4 py-2 rounded-md hover:bg-verdeclaro transition">
                Crear Materia
            </a>
        </div>

        <div class="overflow-x-auto">
            @if (session('success'))
                <div class="bg-green-100 border border-verdeclaro text-verde px-3 py-2 rounded text-sm mb-4"
                    role="alert">
                    <span class="block sm:inline font-medium">
                        {{ session('success') }}
                    </span>
                </div>
            @endif
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2">Codigo</th>
                        <th class="px-4 py-2">Creditos</th>
                        <th class="px-4 py-2">Estado</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($materias as $key => $materia)
                        <tr class="border-b">
                            <td class="px-4 py-2 text-center">{{ $materia->id }}</td>
                            <td class="px-4 py-2">{{ $materia->name }}</td>
                            <td class="px-4 py-2 text-center">{{ $materia->code }}</td>
                            <td class="px-4 py-2 text-center">{{ $materia->credits }}</td>
                            <td class="px-4 py-2 text-center">
                                @if ($materia->is_active)
                                    <span class="bg-green-500 text-white px-2 py-1 rounded-full">Activo</span>
                                @else
                                    <span class="bg-red-500 text-white px-2 py-1 rounded-full">Inactivo</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 flex items-center justify-center space-x-4">
                                <a href="{{ route('administrador.materias.edit', $materia) }}"
                                    class="text-verdeclaro hover:text-verde">
                                    <svg class="w-5 h-5 fill-green-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                    </svg>
                                </a>
                                <form action="{{ route('administrador.materias.destroy', $materia) }}" method="POST"
                                    class="inline-block pt-2">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        <svg class="w-5 h-5 fill-red-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-2 text-center text-gray-500">
                                No hay ninguna materia registrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-administrador-layout>
