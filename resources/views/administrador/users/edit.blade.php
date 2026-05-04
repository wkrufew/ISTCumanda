<x-administrador-layout>
    {{-- AQUI VA EL LISTADO DE TODOS LOS ROLES --}}
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">LiAsignacion de un usuario a un rol</h1>
        {{-- <a href="{{ route('administrador.roles.create') }}"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear
            Rol</a> --}}
            <div></div>
    </div>
    
    <div class="bg-white shadow rounded-lg p-6">
        <div class="mb-4">
            <div class="grid grid-cols-12 gap-4">
                <label for="name" class="col-span-1 text-sm font-medium text-gray-700">Nombre:</label>
                <div class="col-span-11">
                    <p class="form-control block w-full px-3 py-2 text-base leading-6 text-gray-900 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">{{$user->name}}</p>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4 mt-4">
                <label for="email" class="col-span-1 text-sm font-medium text-gray-700">Correo:</label>
                <div class="col-span-11">
                    <p class="form-control block w-full px-3 py-2 text-base leading-6 text-gray-900 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">{{$user->email}}</p>
                </div>
            </div>
        </div>
    
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Lista de Usuarios</h3>
            <form action="{{ route('administrador.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                @foreach ($roles as $role)
                    <div class="flex items-center mt-2">
                        <input 
                            type="radio" 
                            name="roles[]" 
                            value="{{ $role->id }}" 
                            class="mr-2 rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            {{ $user->roles->contains($role->id) ? 'checked' : '' }}
                        >
                        <label class="text-sm text-gray-700">{{ $role->name }}</label>
                    </div>
                @endforeach
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">Asignar Rol</button>
                </div>
            </form>
        </div>
    </div>
    
</x-administrador-layout>