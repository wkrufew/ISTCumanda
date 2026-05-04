<x-administrador-layout>

    <div class="max-w-7xl mx-auto p-4 bg-white mt-2 shadow-md rounded-lg">
        <div class="container">
            <h1 class="mb-4 text-center font-semibold text-lg">Generar Certificado</h1>

            <form action="{{ route('administrador.certificates.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="title" class="form-label">Titulo</label>
                        <input type="text"
                            class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            id="title" name="title" value="{{ old('title', $certificate->title) }}" required>
                    </div>
                    <div>
                        <label for="code" class="form-label">Codigo</label>
                        <input type="text"
                            class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            id="code" name="code" value="{{ old('code', $certificate->code) }}" required>
                    </div>
                    <div>
                        <label for="modalidad" class="form-label">Modalidad</label>
                        <select
                            class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            id="modalidad" name="modalidad" required>
                            <option value="Presencial"
                                {{ old('modalidad', $certificate->modalidad) == 'Presencial' ? 'selected' : '' }}>
                                Presencial</option>
                            <option value="Virtual"
                                {{ old('modalidad', $certificate->modalidad) == 'Virtual' ? 'selected' : '' }}>Virtual
                            </option>
                            <option value="Mixta"
                                {{ old('modalidad', $certificate->modalidad) == 'Mixta' ? 'selected' : '' }}>Mixta
                            </option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="date_start" class="form-label">Fecha de Inicio</label>
                            <input type="date"
                                class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="date_start" name="date_start"
                                value="{{ old('date_start', $certificate->date_start) }}" required>
                        </div>
                        <div class="">
                            <label for="date_end" class="form-label">Fecha Finalizacion</label>
                            <input type="date"
                                class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="date_end" name="date_end" value="{{ old('date_end', $certificate->date_end) }}"
                                required>
                        </div>
                        <div class="">
                            <label for="hours" class="form-label">Horas de duracion</label>
                            <input type="number"
                                class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="hours" name="hours" value="{{ old('hours', $certificate->hours) }}" required>
                        </div>
                        <div>
                            <p>Activo</p>
                            <input type="radio" id="isActive" name="isActive" value="1" checked
                                {{-- {{ old('isActive', $certificate->isActive) == '1' ? 'checked' : '' }} --}}>
                            <label for="isActive">Si</label><br>

                            <input type="radio" id="isActive" name="isActive" value="0" {{-- {{ old('isActive', $certificate->isActive) == '0' ? 'checked' : '' }} --}}>
                            <label for="isActive">No</label>
                        </div>
                    </div>
                    <div class="">
                        <label for="description" class="form-label">Descripcion</label>
                        <textarea name="description" id="description"rows="5"
                            class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            value="{{ old('description', $certificate->document) }}" required></textarea>
                    </div>
                </div>

                <div class="flex justify-center mt-10">
                    <button type="submit"
                        class="rounded-full bg-blue-600 px-4 py-2 text-white border border-blue-800 text-sm">Crear
                        Certificado</button>
                </div>
            </form>
        </div>
    </div>
</x-administrador-layout>
