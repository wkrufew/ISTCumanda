<x-administrador-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Crear Periodo</h2>

            <form action="{{ route('administrador.periods.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <!-- Campo de Nombre de Categoría -->
                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del periodo</label>
                        <input type="text" name="nombre" id="nombre"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('nombre') 'border-red-600' @enderror"
                            value="{{ old('nombre') }}">
                        @error('nombre')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Fecha de inicio del curso -->
                    <div class="mb-4">
                        <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">
                            Inicio del periodo lectivo</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('fecha_inicio') border-red-600 @enderror"
                            value="{{ old('fecha_inicio') }}">
                        @error('fecha_inicio')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fecha de finalización del curso -->
                    <div class="mb-4">
                        <label for="fecha_fin" class="block text-sm font-medium text-gray-700">
                            Finalización del periodo lectivo</label>
                        <input type="date" name="fecha_fin" id="fecha_fin"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('fecha_fin') border-red-600 @enderror"
                            value="{{ old('fecha_fin') }}">
                        @error('fecha_fin')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <!-- Fecha de inicio de inscripcion -->
                    <div class="mb-4">
                        <label for="registration_start_date" class="block text-sm font-medium text-gray-700">Inicia
                            Inscripcion</label>
                        <input type="date" name="registration_start_date" id="registration_start_date"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('registration_start_date') border-red-600 @enderror"
                            value="{{ old('registration_start_date') }}">
                        @error('registration_start_date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fecha de finalización de inscripcion-->
                    <div class="mb-4">
                        <label for="registration_end_date" class="block text-sm font-medium text-gray-700">Finaliza
                            Inscripcion
                        </label>
                        <input type="date" name="registration_end_date" id="registration_end_date"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('registration_end_date') border-red-600 @enderror"
                            value="{{ old('registration_end_date') }}">
                        @error('registration_end_date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Botón Crear -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Crear Periodo
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-administrador-layout>
