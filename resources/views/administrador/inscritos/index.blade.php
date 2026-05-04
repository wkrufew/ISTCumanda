<x-administrador-layout>
    <div class="p-6 rounded-lg bg-white">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">Listo de estudiantes inscritos</h1>
            <a href="{{-- {{ route('administrador.roles.create') }} --}}"
                class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Exportar
            </a>
        </div>
        @if (session('menssage'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-5" role="alert">
                <p>{{ session('menssage') }}</p>
            </div>
        @endif

        <div>
            @livewire('administration.inscritos-index')
        </div>
    </div>

</x-administrador-layout>
