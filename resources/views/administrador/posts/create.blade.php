<x-administrador-layout>
    <div class="container py-8 px-6 bg-white rounded-lg">
        <h1 class="text-2xl font-bold">Crear nuevo Post</h1>
        <hr class="mt-2 mb-6">
        @push('css')
            {{-- <link rel="stylesheet" href="{{ asset('../assets/vendor/ckeditor5.css') }}" /> --}}
            {{-- <link rel="stylesheet" href="{{ asset('../css/ckeditor.css') }}" /> --}}
            <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />
        @endpush

        <form action="{{ route('administrador.posts.store') }}" method="POST" enctype="multipart/form-data"
            autocomplete="off">
            @csrf

            <!-- Título del curso -->
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Título del Post</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('title') border-red-600 @enderror"
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug del curso -->
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug del Post</label>
                    <input readonly type="text" name="slug" id="slug"
                        class="mt-1 block w-full rounded-md border-gray-300 bg-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('slug') border-red-600 @enderror"
                        value="{{ old('slug') }}" readonly>
                    @error('slug')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Descripción del curso -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción del post</label>
                <textarea name="description" id="description"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('description') border-red-600 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <!-- Categoría del curso -->
                <div class="mb-4">
                    <label for="tipo_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                    <select name="tipo_id" id="tipo_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('tipo_id') border-red-600 @enderror">
                        <option value="">Selecciona una categoría</option>
                        @foreach ($tipos as $id => $name)
                            <option value="{{ $id }}" {{ old('tipo_id') == $id ? 'selected' : '' }}>
                                {{ $name }}</option>
                        @endforeach
                    </select>
                    @error('tipo_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <!-- URL externa -->
                <div class="mb-4">
                    <label for="url" class="block text-sm font-medium text-gray-700">URL del post</label>
                    <input type="url" name="url" id="url"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('url') border-red-600 @enderror"
                        value="{{ old('url') }}">
                    @error('url')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>


            {{-- aqui va el campo para agregar una imagen --}}
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Imagen del Post</label>
                <div class="grid grid-cols-3 gap-4">
                    <figure class="mt-2">
                        <img id="picture" class="w-full h-auto object-cover object-center rounded-lg"
                            src="{{ isset($post->image) ? Storage::url($post->image->url) : 'https://images.pexels.com/photos/4325451/pexels-photo-4325451.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940' }}"
                            alt="Imagen del curso">
                    </figure>
                    <div class="col-span-2 flex items-center justify-center">
                        <input type="file" name="file" id="file" accept="image/*"
                            class="mt-3 block w-auto rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('file') border-red-600 @enderror">
                        @error('file')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <!-- Estado (is_active) -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Estado</label>
                    <div class="flex items-center space-x-4 mt-2">
                        <label class="flex items-center">
                            <input type="radio" name="is_active" value="1"
                                class="form-radio h-4 w-4 text-indigo-600 focus:ring-indigo-500 @error('is_active') border-red-600 @enderror"
                                {{ old('is_active') == '1' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Publicado</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="is_active" value="0"
                                class="form-radio h-4 w-4 text-indigo-600 focus:ring-indigo-500 @error('is_active') border-red-600 @enderror"
                                {{ old('is_active') == '0' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Borrador</span>
                        </label>
                    </div>
                    @error('is_active')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Destacado (is_relevant) -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Destacado</label>
                    <div class="flex items-center space-x-4 mt-2">
                        <label class="flex items-center">
                            <input type="radio" name="is_relevant" value="1"
                                class="form-radio h-4 w-4 text-indigo-600 focus:ring-indigo-500 @error('is_relevant') border-red-600 @enderror"
                                {{ old('is_relevant') == '1' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Sí</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="is_relevant" value="0"
                                class="form-radio h-4 w-4 text-indigo-600 focus:ring-indigo-500 @error('is_relevant') border-red-600 @enderror"
                                {{ old('is_relevant') == '0' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">No</span>
                        </label>
                    </div>
                    @error('is_relevant')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <!-- Envío del formulario -->
            <div class="flex justify-center mt-6 mb-4">
                <button type="submit"
                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Crear
                    Post</button>
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


</x-administrador-layout>
