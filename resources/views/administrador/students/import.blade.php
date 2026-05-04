<x-administrador-layout>

    <div class="max-w-7xl mx-auto bg-white rounded-lg p-4 mt-2">
        <div class="flex flex-col items-center justify-center mb-2 py-36 space-y-4">
            <h2 class="text-lg font-semibold uppercase">Importar Estudiantes y Certificados</h2>

            <!-- Mostrar mensaje de éxito -->
            @if (session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif
            @if (session('error'))
                <p style="red: green;">{{ session('error') }}</p>
            @endif

            <!-- Formulario para cargar el archivo -->
            <form action="{{ route('administrador.students.enrollet') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="file">Seleccione el archivo Excel:</label><br>
                <input class="mt-2 p-3 shadow-md bg-gray-100 border border-gray-200 rounded-full" type="file"
                    name="file" id="file" required>
                <button type="submit" class="px-3 py-2 rounded-full text-white bg-green-600 ml-4">Importar</button>
            </form>

            <!-- Mostrar errores de validación -->
            @if ($errors->any())
                <ul style="color: red;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

        </div>

    </div>

</x-administrador-layout>
