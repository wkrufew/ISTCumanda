<div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8 border border-gray-200  rounded-lg mb-4">

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>¡Ups! Algo salió mal.</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-3 gap-4">
        <div class="">
            <label for="first_name" class="form-label text-sm font-medium">Nombres</label>
            <input type="text" name="first_name" id="first_name"
                class="focus:ring-verdeclaro focus:border-verdeclaro block w-full shadow-md sm:text-sm rounded-full border border-verde"
                value="{{ old('first_name', $estudiante->first_name ?? '') }}" required>
        </div>
        <div class="">
            <label for="last_name" class="form-label text-sm font-medium">Apellidos</label>
            <input type="text" name="last_name" id="last_name"
                class="focus:ring-verdeclaro focus:border-verdeclaro block w-full shadow-md sm:text-sm rounded-full border border-verde"
                value="{{ old('last_name', $estudiante->last_name ?? '') }}" required>
        </div>
        {{-- email --}}
        <div class="">
            <label for="email" class="form-label text-sm font-medium">Email</label>
            <input type="email" name="email" id="email"
                class="focus:ring-verdeclaro focus:border-verdeclaro block w-full shadow-md sm:text-sm rounded-full border border-verde"
                value="{{ old('email', $estudiante->email ?? '') }}" required>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4">
        <div class="">
            <label for="document_type" class="form-label text-sm font-medium">Tipo de Documento</label>
            <select
                class="focus:ring-verdeclaro focus:border-verdeclaro block w-full shadow-md sm:text-sm rounded-full border border-verde {{-- focus:ring-opacity-50 --}}"
                id="document_type" name="document_type" required>
                <option value="">Seleccione un tipo de documento</option>
                <option value="Cedula"
                    {{ old('document_type', $estudiante->document_type) == 'Cedula' ? 'selected' : '' }}>Cédula
                </option>
                <option value="Pasaporte"
                    {{ old('document_type', $estudiante->document_type) == 'Pasaporte' ? 'selected' : '' }}>
                    Pasaporte</option>
                <option value="Cedula Extranjera"
                    {{ old('document_type', $estudiante->document_type) == 'Cedula Extranjera' ? 'selected' : '' }}>
                    Cédula Extranjera</option>
            </select>
        </div>
        <div class="">
            <label for="id_number" class="form-label text-sm font-medium">Documento</label>
            <input type="text" name="id_number" id="id_number"
                class="focus:ring-verdeclaro focus:border-verdeclaro block w-full shadow-md sm:text-sm rounded-full border border-verde"
                value="{{ old('id_number', $estudiante->id_number ?? '') }}" required>
        </div>
        <div class="">
            <label for="phone" class="form-label text-sm font-medium">Teléfono</label>
            <input type="text" name="phone" id="phone"
                class="focus:ring-verdeclaro focus:border-verdeclaro block w-full shadow-md sm:text-sm rounded-full border border-verde"
                value="{{ old('phone', $estudiante->phone ?? '') }}" required>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4">
        {{-- address --}}
        <div class="">
            <label for="address" class="form-label text-sm font-medium">Dirección</label>
            <input type="text" name="address" id="address"
                class="focus:ring-verdeclaro focus:border-verdeclaro block w-full shadow-md sm:text-sm rounded-full border border-verde"
                value="{{ old('address', $estudiante->address ?? '') }}" required>
        </div>
        <div class="">
            <label for="status" class="form-label text-sm font-medium">Estado</label>
            <select
                class="focus:ring-verdeclaro focus:border-verdeclaro block w-full shadow-md sm:text-sm rounded-full border border-verde {{-- focus:ring-opacity-50 --}}"
                id="status" name="status" required>
                <option value="">Seleccione un estado</option>
                <option value="Cursando" {{ old('status', $estudiante->status) == 'Cursando' ? 'selected' : '' }}>
                    Cursando
                </option>
                <option value="Pendiente" {{ old('status', $estudiante->status) == 'Pendiente' ? 'selected' : '' }}>
                    Pendiente</option>
                <option value="Retirado" {{ old('status', $estudiante->status) == 'Retirado' ? 'selected' : '' }}>
                    Retirado
                </option>
                <option value="Terminado" {{ old('status', $estudiante->status) == 'Terminado' ? 'selected' : '' }}>
                    Terminado</option>
            </select>
        </div>
        <div class="form-check flex items-center justify-center">
            <input type="hidden" name="is_active" value="0">
            <input class="form-check-input checked:bg-verdeclaro" type="checkbox" name="is_active" id="is_active"
                value="1" {{ old('is_active', $estudiante->is_active ?? false) ? 'checked' : '' }}>
            <label class="form-check-label ml-1" for="is_active"> ¿Está activo?</label>
        </div>
    </div>
</div>
