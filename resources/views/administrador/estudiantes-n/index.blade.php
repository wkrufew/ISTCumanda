<x-administrador-layout>
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Estudiante - Acta de Calificaciones</h2>
            <a href="{{ route('administrador.estudiantes.create') }}"
                class="inline-block bg-verde text-white px-4 py-2 rounded-md hover:bg-verdeclaro transition">
                Inscribir Estudiante
            </a>
        </div>

        @livewire('administration.estudiantes-index')
    </div>

</x-administrador-layout>
