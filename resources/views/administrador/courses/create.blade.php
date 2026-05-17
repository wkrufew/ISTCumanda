<x-administrador-layout>
    <div class="container py-8 px-6 bg-white rounded-lg">
        <h1 class="text-2xl font-bold">Crear nuevo curso</h1>
        <hr class="mt-2 mb-6">
        @push('css')
            <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />
        @endpush

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
        <form action="{{ route('administrador.courses.store') }}" method="POST" enctype="multipart/form-data"
            autocomplete="off">
            @csrf

            <!-- Título del curso -->
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Título del curso</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('title') border-red-600 @enderror"
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug del curso -->
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug del curso</label>
                    <input readonly type="text" name="slug" id="slug"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('slug') border-red-600 @enderror"
                        value="{{ old('slug') }}" readonly>
                    @error('slug')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Descripción del curso -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción del curso</label>
                <textarea name="description" id="description"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('description') border-red-600 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-4 gap-4">
                <!-- modalidad -->
                <div class="mb-4">
                    <label for="modality" class="block text-sm font-medium text-gray-700">Modalidad</label>
                    <select name="modality" id="modality"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('modality') border-red-600 @enderror">
                        <option value="">Selecciona una modalidad</option>
                        <option value="Presencial" {{ old('modality') == 'Presencial' ? 'selected' : '' }}>
                            Presencial</option>
                        <option value="Virtual" {{ old('modality') == 'Virtual' ? 'selected' : '' }}>
                            Virtual</option>
                        <option value="Hibrida" {{ old('modality') == 'Hibrida' ? 'selected' : '' }}>
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
                        value="{{ old('duration') }}">
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
                        value="{{ old('total_investment') }}">
                    @error('total_investment')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <!-- investment_per_cycle -->
                <div class="mb-4">
                    <label for="investment_per_cycle" class="block text-sm font-medium text-gray-700">Inversión por
                        ciclo</label>
                    <input type="number" name="investment_per_cycle" id="investment_per_cycle"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('investment_per_cycle') border-red-600 @enderror"
                        value="{{ old('investment_per_cycle') }}">
                    @error('investment_per_cycle')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


            </div>

            <!-- COMUNICADO -->
            <div class="mb-4">
                <label for="comunicado" class="block text-sm font-medium text-gray-700">Comunicado</label>
                <input type="text" name="comunicado" id="comunicado"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('comunicado') border-red-600 @enderror"
                    value="{{ old('comunicado') }}">
                @error('comunicado')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- SECCIÓN DE DOCUMENTOS Y ENLACES DINÁMICOS -->
            <div class="mb-6 border border-indigo-100 rounded-xl bg-indigo-50/40 p-4">
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-700">Documentos y enlaces</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Máximo 3 enlaces. Cada uno puede tener nombre y color personalizado.</p>
                    </div>
                    <button type="button" id="add-link"
                        class="inline-flex items-center space-x-1 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium px-3 py-1.5 rounded-lg transition">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        <span>Agregar enlace</span>
                    </button>
                </div>
                <div id="links-container" class="space-y-3">
                    {{-- filas generadas por JS --}}
                </div>
                <p id="links-limit-msg" class="text-xs text-amber-600 mt-2 hidden">Ya alcanzaste el máximo de 3 enlaces.</p>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <!-- approval_date CAMPO FECHA -->
                <div class="mb-4">
                    <label for="approval_date" class="block text-sm font-medium text-gray-700">Fecha de
                        aprobación</label>
                    <input type="date" name="approval_date" id="approval_date"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('approval_date') border-red-600 @enderror"
                        value="{{ old('approval_date') }}">
                    @error('approval_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Categoría del curso -->
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                    <select name="category_id" id="category_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('category_id') border-red-600 @enderror">
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categories as $id => $name)
                            <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>
                                {{ $name }}</option>
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
                            <option value="{{ $id }}" {{ old('period_id') == $id ? 'selected' : '' }}>
                                {{ $nombre }}</option>
                        @endforeach
                    </select>
                    @error('period_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- aqui va el campo para agregar una imagen --}}
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Imagen del curso</label>
                <div class="grid grid-cols-3 gap-4">
                    <figure class="mt-2">
                        <img id="picture" class="w-full h-auto object-cover object-center rounded-lg"
                            src="{{ isset($course->image) ? Storage::url($course->image->url) : 'https://images.pexels.com/photos/4325451/pexels-photo-4325451.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940' }}"
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

            <!-- Envío del formulario -->
            <div class="flex justify-center mt-6 mb-4">
                <button type="submit"
                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Crear
                    Curso</button>
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
        <script>
            const COLORS = [
                { value: 'verde',      hex: '#32620e', label: 'Verde' },
                { value: 'verdeclaro', hex: '#7ea41e', label: 'Verde claro' },
                { value: 'morado',     hex: '#84219f', label: 'Morado' },
                { value: 'naranja',    hex: '#e59e20', label: 'Naranja' },
                { value: 'azul',       hex: '#0369a1', label: 'Azul' },
            ];
            const TEXT_COLORS = [
                { value: 'white',    bg: '#ffffff', border: '1px solid #d1d5db', label: 'Blanco' },
                { value: 'gray-900', bg: '#111827', border: 'none',              label: 'Oscuro' },
            ];

            let linkCount = 0;
            const MAX_LINKS = 3;

            function buildSwatches(type, index, selectedValue) {
                const items = type === 'bg' ? COLORS : TEXT_COLORS;
                return items.map(c => `
                    <label class="cursor-pointer group" title="${c.label}">
                        <input type="radio" name="links[${index}][${type}]" value="${c.value}" class="sr-only link-radio"
                            ${selectedValue === c.value ? 'checked' : ''}>
                        <span class="swatch-circle block w-7 h-7 rounded-full transition-all"
                            style="background:${c.bg || c.hex};${c.border ? 'border:' + c.border + ';' : ''}
                            outline: ${selectedValue === c.value ? '3px solid #374151' : '3px solid transparent'};
                            outline-offset: 2px;">
                        </span>
                    </label>
                `).join('');
            }

            function buildLinkRow(index, data = {}) {
                const defaultBg   = data.bg   || 'naranja';
                const defaultText = data.text || 'white';
                return `
                <div class="link-row bg-white border border-gray-200 rounded-xl p-4 shadow-sm" data-index="${index}">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-xs font-semibold text-indigo-600 uppercase tracking-wide link-number">Enlace ${index + 1}</span>
                        <button type="button" class="remove-link flex items-center space-x-1 text-xs text-red-400 hover:text-red-600 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            <span>Eliminar</span>
                        </button>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <div>
                            <label class="block text-xs text-gray-500 mb-1 font-medium">URL del documento</label>
                            <input type="url" name="links[${index}][url]" value="${data.url || ''}"
                                placeholder="https://drive.google.com/..."
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-500 mb-1 font-medium">Nombre del botón</label>
                            <input type="text" name="links[${index}][label]" value="${data.label || ''}"
                                placeholder="Ej: Malla Curricular"
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 bg-gray-50 rounded-lg p-3">
                        <div>
                            <p class="text-xs text-gray-500 font-medium mb-2">Color de fondo</p>
                            <div class="flex space-x-2">${buildSwatches('bg', index, defaultBg)}</div>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-medium mb-2">Color del texto</p>
                            <div class="flex space-x-2">${buildSwatches('text', index, defaultText)}</div>
                        </div>
                    </div>
                </div>`;
            }

            function refreshNumbers() {
                $('#links-container .link-row').each(function(i) {
                    $(this).find('.link-number').text(`Enlace ${i + 1}`);
                });
            }

            function updateAddButton() {
                const count = $('#links-container .link-row').length;
                $('#add-link').toggleClass('opacity-50 cursor-not-allowed', count >= MAX_LINKS);
                $('#links-limit-msg').toggleClass('hidden', count < MAX_LINKS);
            }

            $(document).on('change', '.link-radio', function () {
                const name = $(this).attr('name');
                $(`input[name="${name}"]`).each(function () {
                    const outline = $(this).is(':checked') ? '3px solid #374151' : '3px solid transparent';
                    $(this).next('.swatch-circle').css('outline', outline);
                });
            });

            $('#add-link').on('click', function () {
                if ($('#links-container .link-row').length >= MAX_LINKS) return;
                $('#links-container').append(buildLinkRow(linkCount++));
                refreshNumbers();
                updateAddButton();
            });

            $(document).on('click', '.remove-link', function () {
                $(this).closest('.link-row').remove();
                refreshNumbers();
                updateAddButton();
            });
        </script>
    @endpush


</x-administrador-layout>
