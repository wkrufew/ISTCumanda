<x-administrador-layout :course="$course">
    <div class="max-w-7xl mx-auto py-6 px-2">
        {{-- CDN PARA CKEDITOR --}}

        @push('css')
            <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />
        @endpush

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Editar Curso</h2>

            {{-- RECORRER TODOS LOS ERRORES  RECORRER CON UN FOR TODOS LOS ERRORES --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">¡Error!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('administrador.courses.update', $course) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-4">
                    <!-- Campo de Título -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Título del curso</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $course->title) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('title') border-red-600 @enderror">
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo de Slug -->
                    <div class="mb-4">
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug del curso</label>
                        <input readonly type="text" name="slug" id="slug"
                            value="{{ old('slug', $course->slug) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('slug') border-red-600 @enderror">
                        @error('slug')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Campo de Descripción -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Descripción del
                        curso</label>
                    <textarea name="description" id="description"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('description') border-red-600 @enderror">{{ old('description', $course->description) }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <!-- URL externa 1 -->
                    <div class="mb-4">
                        <label for="url" class="block text-sm font-medium text-gray-700">URL del curso 1</label>
                        <input type="url" name="url" id="url"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('url') border-red-600 @enderror"
                            value="{{ old('url', $course->url) }}">
                        @error('url')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- URL externa 2 -->
                    <div class="mb-4">
                        <label for="url2" class="block text-sm font-medium text-gray-700">URL del curso 2</label>
                        <input type="url" name="url2" id="url2"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('url2') border-red-600 @enderror"
                            value="{{ old('url2', $course->url2) }}">
                        @error('url2')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- COMUNICADO -->
                    <div class="mb-4">
                        <label for="comunicado" class="block text-sm font-medium text-gray-700">Comunicado</label>
                        <input type="text" name="comunicado" id="comunicado"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('comunicado') border-red-600 @enderror"
                            value="{{ old('comunicado', $course->comunicado) }}">
                        @error('comunicado')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-4 gap-4">
                    <!-- modalidad -->
                    <div class="mb-4">
                        <label for="modality" class="block text-sm font-medium text-gray-700">Modalidad</label>
                        <select name="modality" id="modality"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('modality') border-red-600 @enderror">
                            <option value="">Selecciona una modalidad</option>
                            <option value="Presencial"
                                {{ old('modality', $course->modality) == 'Presencial' ? 'selected' : '' }}>
                                Presencial</option>
                            <option value="Virtual"
                                {{ old('modality', $course->modality) == 'Virtual' ? 'selected' : '' }}>
                                Virtual</option>
                            <option value="Hibrida"
                                {{ old('modality', $course->modality) == 'Hibrida' ? 'selected' : '' }}>
                                Hibrida</option>
                        </select>
                        @error('modality')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Duration -->
                    <div class="mb-4">
                        <label for="duration" class="block text-sm font-medium text-gray-700">Duración</label>
                        <input type="text" name="duration" id="duration"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('duration') border-red-600 @enderror"
                            value="{{ old('duration', $course->duration) }}">
                        @error('duration')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- total_investment -->
                    <div class="mb-4">
                        <label for="total_investment" class="block text-sm font-medium text-gray-700">Inversión
                            total</label>
                        <input type="number" name="total_investment" id="total_investment"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('total_investment') border-red-600 @enderror"
                            value="{{ old('total_investment', $course->total_investment) }}">
                        @error('total_investment')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- investment_per_cycle -->
                    <div class="mb-4">
                        <label for="investment_per_cycle" class="block text-sm font-medium text-gray-700">Inversión
                            por ciclo</label>
                        <input type="number" name="investment_per_cycle" id="investment_per_cycle"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('investment_per_cycle') border-red-600 @enderror"
                            value="{{ old('investment_per_cycle', $course->investment_per_cycle) }}">
                        @error('investment_per_cycle')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <!-- fecha approval_date -->
                    <div class="mb-4">
                        <label for="approval_date" class="block text-sm font-medium text-gray-700">Fecha de
                            aprobación</label>
                        <input type="date" name="approval_date" id="approval_date"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('approval_date') border-red-600 @enderror"
                            value="{{ old('approval_date', $course->approval_date->format('Y-m-d')) }}">
                        @error('approval_date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Campo de Categoría -->
                    <div class="mb-4">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select name="category_id" id="category_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('category_id') border-red-600 @enderror">
                            @foreach ($categories as $id => $name)
                                <option value="{{ $id }}"
                                    {{ old('category_id', $course->category_id) == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Periodo lectivo del curso -->
                    <div class="mb-4">
                        <label for="period_id" class="block text-sm font-medium text-gray-700">Periodos</label>
                        <select name="period_id" id="period_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('period_id') border-red-600 @enderror">
                            <option value="">Selecciona un periodo</option>
                            @foreach ($periods as $id => $nombre)
                                <option value="{{ $id }}"
                                    {{ old('period_id', $course->period_id) == $id ? 'selected' : '' }}>
                                    {{ $nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('period_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Imagen del curso</label>
                    <div class="grid grid-cols-3 gap-4">
                        <figure class="mt-2">
                            <img id="picture" class="w-full h-auto object-cover object-center rounded-lg"
                                src="{{ isset($course->image) ? Storage::url($course->image->url) : 'https://images.pexels.com/photos/4325451/pexels-photo-4325451.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940' }}"
                                alt="Imagen del curso">
                        </figure>
                        <div class="col-span-2 flex items-center justify-center">
                            <input type="file" name="file" id="file" accept="image/* "
                                class="mt-3 block w-auto rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('file') border-red-600 @enderror">
                            @error('file')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Botón para actualizar -->
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('administrador.courses.index') }}"
                        class="inline-flex justify-center rounded-md border border-transparent bg-gray-300 py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Actualizar Curso
                    </button>
                </div>
            </form>
        </div>
        @push('js')
            <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
                crossorigin="anonymous"></script>
            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
            <script>
                ClassicEditor
                    .create(document.querySelector('#description'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
            <script src="{{ asset('../js/forms.js') }}"></script>
        @endpush
    </div>
</x-administrador-layout>
