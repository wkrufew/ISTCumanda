<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-md mt-2">

    {{-- Título --}}
    <h1 class="text-2xl font-semibold text-gray-700 mb-4">
        Asignar Materias a la Carrera: <span class="text-verde font-bold">{{ $carrera->name }} -
            {{ $carrera->code }}</span>
    </h1>

    {{-- Mensaje de sesión --}}
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded">
            {{ session('message') }}
        </div>
    @endif

    {{-- Validaciones --}}
    @error('selectedPeriod')
        <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
    @enderror
    @error('selectedSemester')
        <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
    @enderror
    @error('selectedSubjects')
        <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
    @enderror

    {{-- Formulario --}}
    <form wire:submit.prevent="store" class="space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <div>
                    <label class="block font-medium text-sm text-gray-700 mb-1">Periodo</label>
                    <select wire:model="selectedPeriod" class="w-full border-gray-300 rounded-full shadow-sm">
                        <option value="">Seleccione un periodo</option>
                        @foreach ($periods as $period)
                            <option value="{{ $period->id }}">{{ $period->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Semestre --}}
                <div>
                    <label class="block font-medium text-sm text-gray-700 mb-1">Semestre</label>
                    <select wire:model="selectedSemester" class="w-full border-gray-300 rounded-full shadow-sm">
                        <option value="">Seleccione un semestre</option>
                        @foreach ($semesters as $semester)
                            <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                {{-- Materias --}}
                <div>
                    <label class="block font-medium text-sm text-gray-700 mb-1">Materias</label>
                    <ul class="max-h-72 overflow-y-auto border border-gray-200 p-2 rounded-md space-y-2">
                        @foreach ($subjects as $subject)
                            <li>
                                <label class="flex items-center space-x-2 shadow-md p-2 rounded-full bg-gray-100">
                                    <input type="checkbox" wire:model="selectedSubjects" value="{{ $subject->id }}">
                                    <span class="font-medium text-sm">{{ $subject->name }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        {{-- Botón --}}
        <div class="pt-2 flex justify-center space-x-4">
            <button type="submit"
                class="bg-verde hover:bg-verdeclaro text-white font-semibold py-2 px-4 rounded-md transition">
                Asignar Materias
            </button>
            <a class="" href="{{ route('administrador.carreras.assignments', $carrera) }}">
                Regresar al listado
            </a>
        </div>

    </form>
</div>
