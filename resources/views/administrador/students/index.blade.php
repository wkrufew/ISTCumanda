<x-administrador-layout>

    <div class="bg-white rounded-lg p-4 mt-2">
        <div class="flex items-center justify-between mb-2 ">
            <h1 class="text-lg md:text-2xl font-bold text-gray-800">Listo de Estudiantes a certificar</h1>
            <a href="{{ route('administrador.students.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear
                Estudiante</a>
            <a href="{{ route('administrador.students.import') }}"
                class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Importar
                Estudiantes</a>
        </div>

        @if (session('menssage'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-5" role="alert">
                <p>{{ session('menssage') }}</p>
            </div>
        @endif

        <div>
            @livewire('administration.student-index')
        </div>
    </div>

</x-administrador-layout>
