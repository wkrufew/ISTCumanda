<div>
    <div class="bg-white shadow-md rounded-lg p-6 mb-6 mt-3">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-800">{{ $carrera->name }} - {{ $carrera->code }}</h2>
            <a href="{{ route('administrador.assignments.crear', $carrera) }}"
                class="inline-block bg-verde text-white px-4 py-2 rounded-md hover:bg-verdeclaro transition">
                + Nueva Asignacion
            </a>
        </div>
        @if (session()->has('message'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded">
                {{ session('message') }}
            </div>
        @endif
        <div>
            <div class="flex gap-4 justify-center mb-4 max-w-2xl mx-auto">
                <div>
                    <label class="block mb-1 text-sm font-semibold text-center">Periodo</label>
                    <select wire:model.live="periodo_id" class="border rounded-full px-2 py-1 w-56">
                        <option value="">Todos</option>
                        @foreach ($periods as $periodo)
                            <option value="{{ $periodo->id }}">{{ $periodo->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1 text-sm font-semibold text-center">Semestre</label>
                    <select wire:model.live="semester_id" class="border rounded-full px-2 py-1 w-56">
                        <option value="">Todos</option>
                        @foreach ($semesters as $semester)
                            <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <table class="w-full text-sm text-left border">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="border px-2 py-1">ID</th>
                        <th class="border px-2 py-1">Periodo</th>
                        <th class="border px-2 py-1">Semestre</th>
                        <th class="border px-2 py-1">Materia</th>
                        <th class="border px-2 py-1">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($assignments as $asignacion)
                        <tr>
                            <td class="border px-2 py-1">{{ $asignacion->id }}</td>
                            <td class="border px-2 py-1">{{ $asignacion->periodo->name }}</td>
                            <td class="border px-2 py-1">{{ $asignacion->semester->name }}</td>
                            <td class="border px-2 py-1">{{ $asignacion->subject->name }}</td>
                            <td class="border px-2 py-1">
                                {{-- <button class="bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700 transition"
                                    wire:click="$dispatch('editar-asignacion', { id: {{ $asignacion->id }} })">
                                    Editar
                                </button> --}}
                                <a href="{{ route('administrador.assignments.editar', ['carrera' => $carrera, 'asignacion' => $asignacion]) }}"
                                    class="bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700 transition">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">
                                No hay asignaciones registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
