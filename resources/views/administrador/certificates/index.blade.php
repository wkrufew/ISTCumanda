<x-administrador-layout>
    <div class="bg-white p-4 mt-2 rounded-lg">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">Listo de Certificaciones</h1>
            <a href="{{ route('administrador.certificates.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear
                Certificado</a>

        </div>

        @if (session('menssage'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-5" role="alert">
                <p>{{ session('menssage') }}</p>
            </div>
        @endif
        <div>
            <livewire:administration.certificate-index />
        </div>
    </div>
</x-administrador-layout>
