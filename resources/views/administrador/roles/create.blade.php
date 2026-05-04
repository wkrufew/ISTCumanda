<x-administrador-layout>
    <div class="max-w-7xl mx-auto p-6 mt-3 rounded-lg shadow-lg bg-white">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">Crear Rol</h1>
            <a href="{{ route('administrador.roles.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Volver</a>
        </div>
        <div class="mt-4">
            <form action="{{ route('administrador.roles.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre de Rol:</label>
                    <input type="text" name="name" id="name"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50{{ $errors->has('name') ? ' border-red-500' : '' }}"
                        placeholder="Escriba un nombre" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-sm text-red-500 mt-1">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <strong class="block text-sm font-medium text-gray-700">Permisos</strong>
                    @error('permissions')
                        <br>
                        <small class="text-red-500">
                            <strong>{{ $message }}</strong>
                        </small>
                        <br>
                    @enderror

                    @foreach ($permissions as $permission)
                        <div class="flex items-center space-y-2">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                class="mr-2 mt-2 rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <label class="text-sm text-gray-700">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="mt-2 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">Crear
                        Rol</button>
                </div>
            </form>
        </div>
    </div>
</x-administrador-layout>
