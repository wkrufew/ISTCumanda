<x-administrador-layout>

    <div class="max-w-7xl mx-auto p-6 mt-3 rounded-lg shadow-lg bg-white">
        <h1 class="mb-4 text-center font-semibold text-lg">Editar Estudiante</h1>

        <form action="{{ route('administrador.students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text"
                        class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        id="name" name="name" value="{{ old('name', $student->name) }}" required>
                </div>
                <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                        class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        id="email" name="email" value="{{ old('email', $student->email) }}">
                </div>
                <div>
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text"
                        class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        id="phone" name="phone" value="{{ old('phone', $student->phone) }}">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-4">
                <div>
                    <label for="codigo" class="form-label">Codigo</label>
                    <input type="text"
                        class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        id="codigo" name="codigo" value="{{ old('codigo', $student->codigo) }}">
                </div>
                <div class="col-span-2">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text"
                        class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        id="address" name="address" value="{{ old('address', $student->address) }}">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="">
                    <label for="document_type" class="form-label">Tipo de Documento</label>
                    <select
                        class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        id="document_type" name="document_type" required>
                        <option value="Cedula"
                            {{ old('document_type', $student->document_type) == 'Cedula' ? 'selected' : '' }}>Cédula
                        </option>
                        <option value="Pasaporte"
                            {{ old('document_type', $student->document_type) == 'Pasaporte' ? 'selected' : '' }}>
                            Pasaporte</option>
                        <option value="Cedula Extranjera"
                            {{ old('document_type', $student->document_type) == 'Cedula Extranjera' ? 'selected' : '' }}>
                            Cédula Extranjera</option>
                    </select>
                </div>
                <div class="">
                    <label for="document" class="form-label">Número de Documento</label>
                    <input type="text"
                        class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        id="document" name="document" value="{{ old('document', $student->document) }}" required>
                </div>
                <div>
                    <label for="status" class="form-label">Estado</label>

                    <select
                        class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        id="status" name="status" required>
                        <option value="Cursando" {{ old('status', $student->status) == 'Cursando' ? 'selected' : '' }}>
                            Cursando</option>
                        <option value="Pendiente"
                            {{ old('status', $student->status) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="Retirado" {{ old('status', $student->status) == 'Retirado' ? 'selected' : '' }}>
                            Retirado</option>
                        <option value="Terminado"
                            {{ old('status', $student->status) == 'Terminado' ? 'selected' : '' }}>
                            Terminado</option>
                    </select>
                </div>
                <div>
                    <p class="text-center">Activo</p>
                    <div class="flex items-center justify-center bg-gray-200 h-10 rounded-md">
                        <input type="radio" id="is_active" name="is_active" value="1"
                            {{ old('is_active', $student->is_active) == '1' ? 'checked' : '' }}>
                        <label for="is_active" class="ml-1">Si</label>

                        <input class="ml-4" type="radio" id="is_active" name="is_active" value="0"
                            {{ old('is_active', $student->is_active) == '0' ? 'checked' : '' }}>
                        <label for="is_active" class="ml-1">No</label>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-10">
                <button type="submit"
                    class="rounded-full bg-blue-600 px-4 py-2 text-white border border-blue-800 text-sm">Actualizar
                    Estudiante</button>
            </div>
        </form>
    </div>

</x-administrador-layout>
