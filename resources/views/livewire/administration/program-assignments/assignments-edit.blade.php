<div>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
        <h1 class="text-xl font-bold mb-4">Editar Asignación de Materias</h1>

        @if (session()->has('message'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="update" class="space-y-4">
            <div>
                <label class="block text-sm font-medium">Periodo {{ $asignacion->periodo->name }}</label>
                <select wire:model="periodo_id" class="w-full border rounded px-3 py-2">
                    <option value="">Seleccione</option>
                    @foreach ($periodos as $periodo)
                        <option value="{{ $periodo->id }}">{{ $periodo->name }}</option>
                    @endforeach
                </select>
                @error('periodo_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Semestre</label>
                <select wire:model.live="semester_id" class="w-full border rounded px-3 py-2">
                    <option value="">Seleccione</option>
                    @foreach ($semesters as $semester)
                        <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                    @endforeach
                </select>
                @error('semester_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Materias</label>
                <div class="grid grid-cols-2 gap-2">
                    @foreach ($subjects as $subject)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" value="{{ $subject->id }}" wire:model="selected_subjects">
                            <span>{{ $subject->name }}</span>
                        </label>
                    @endforeach
                </div>
                @error('selected_subjects')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Actualizar Asignación
                </button>
            </div>
        </form>
    </div>
</div>
