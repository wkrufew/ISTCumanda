<x-administrador-layout :post="$post">
    <div class="max-w-7xl mx-auto py-6 px-2">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Editar Post</h2>
            @push('css')
                <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />
            @endpush
            <form action="{{ route('administrador.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-4">
                    <!-- Campo de Título -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Título del post</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('title') border-red-600 @enderror">
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo de Slug -->
                    <div class="mb-4">
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug del post</label>
                        <input readonly type="text" name="slug" id="slug"
                            value="{{ old('slug', $post->slug) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('slug') border-red-600 @enderror">
                        @error('slug')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Campo de Descripción -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Descripción del
                        post</label>
                    <textarea name="description" id="description"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('description') border-red-600 @enderror">{{ old('description', $post->description) }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <!-- URL externa -->
                    <div class="mb-4">
                        <label for="url" class="block text-sm font-medium text-gray-700">URL del curso</label>
                        <input type="url" name="url" id="url"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('url') border-red-600 @enderror"
                            value="{{ old('url', $post->url) }}">
                        @error('url')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Campo de Categoría -->
                    <div class="mb-4">
                        <label for="tipo_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select name="tipo_id" id="tipo_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('tipo_id') border-red-600 @enderror">
                            <option value="">Selecciona una categoría</option>
                            @foreach ($tipos as $id => $name)
                                <option value="{{ $id }}"
                                    {{ old('tipo_id', $post->tipo_id ?? '') == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('tipo_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Imagen del Post</label>
                    <div class="grid grid-cols-3 gap-4">
                        <figure class="mt-2">
                            <img id="picture" class="w-full h-auto object-cover object-center rounded-lg"
                                src="{{ isset($post->image) ? Storage::url($post->image->url) : 'https://images.pexels.com/photos/4325451/pexels-photo-4325451.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940' }}"
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
                <!-- Estado (is_active) -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Estado</label>
                    <div class="flex items-center space-x-4 mt-2">
                        <label class="flex items-center">
                            <input type="radio" name="is_active" value="1"
                                class="form-radio h-4 w-4 text-indigo-600 focus:ring-indigo-500 @error('is_active') border-red-600 @enderror"
                                {{ old('is_active', $post->is_active) == '1' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Publicado</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="is_active" value="0"
                                class="form-radio h-4 w-4 text-indigo-600 focus:ring-indigo-500 @error('is_active') border-red-600 @enderror"
                                {{ old('is_active', $post->is_active) == '0' ? 'checked' : '' }}>
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
                                {{ old('is_relevant', $post->is_relevant) == '1' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Sí</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="is_relevant" value="0"
                                class="form-radio h-4 w-4 text-indigo-600 focus:ring-indigo-500 @error('is_relevant') border-red-600 @enderror"
                                {{ old('is_relevant', $post->is_relevant) == '0' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">No</span>
                        </label>
                    </div>
                    @error('is_relevant')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botón para actualizar -->
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('administrador.posts.index') }}"
                        class="inline-flex justify-center rounded-md border border-transparent bg-gray-300 py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Actualizar Post
                    </button>
                </div>
            </form>
        </div>
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
