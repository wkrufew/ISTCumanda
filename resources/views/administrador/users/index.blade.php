<x-administrador-layout>
    {{-- AQUI VA EL LISTADO DE TODOS LOS ROLES --}}
    <div class="max-w-7xl mx-auto p-6 mt-3 rounded-lg bg-white">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">Listo de personal administrativo</h1>
            {{-- <a href="{{ route('administrador.roles.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear
                Rol</a> --}}
            <div></div>
        </div>
        {{-- mensaje de session --}}
        @if (session('menssage'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-5" role="alert">
                <p>{{ session('menssage') }}</p>
            </div>
        @endif

        <div>
            @livewire('administration.administrations-users')
        </div>
    </div>

</x-administrador-layout>
