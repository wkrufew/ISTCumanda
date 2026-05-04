<section>
    <h1 class="text-2xl font-bold">PROFESORES DEL CURSO</h1>

    <hr class="mt-2 mb-6">

    @foreach ($course->teachers as $item)
        <article class="px-4 py-2 rounded-md bg-white border border-gray-200 mb-2 shadow shadow-green-600/50">
            <div class="">
                @if ($teacher->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <input wire:model.live="editedName" placeholder="Ingresa el nombre del profesor"
                                    class="block w-full py-2 px-3 border border-gray-50 bg-gray-100 rounded-full shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                @error('editedName')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mt-1"
                                        role="alert">
                                        <strong class="font-bold">Ups!</strong>
                                        <span class="block sm:inline text-green-700">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <input wire:model.live="editedEmail" placeholder="Ingresa el correo del profesor"
                                    class="block w-full py-2 px-3 border border-gray-50 bg-gray-100 rounded-full shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                @error('editedEmail')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mt-1"
                                        role="alert">
                                        <strong class="font-bold">Ups!</strong>
                                        <span class="block sm:inline text-green-700">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 my-4">
                            <div>
                                <input wire:model.live="editedPhone" placeholder="Ingresa el telefono del profesor"
                                    class="block w-full py-2 px-3 border border-gray-50 bg-gray-100 rounded-full shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                @error('editedPhone')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mt-1"
                                        role="alert">
                                        <strong class="font-bold">Ups!</strong>
                                        <span class="block sm:inline text-green-700">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <input wire:model.live="editedUrl"
                                    placeholder="Ingresa el nombre del profesor del curso..."
                                    class="block w-full py-2 px-3 border border-gray-50 bg-gray-100 rounded-full shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                @error('editedUrl')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mt-1"
                                        role="alert">
                                        <strong class="font-bold">Ups!</strong>
                                        <span class="block sm:inline text-green-700">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <textarea placeholder="Ingresa ela descripcion del profesor" wire:model="editedDescription"
                                    class="block w-full h-32 py-3 px-3 border border-gray-300 bg-gray-100 rounded-lg shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"> </textarea>
                                @error('editedDescription')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-full relative mt-1"
                                        role="alert">
                                        <strong class="font-bold">Ups!</strong>
                                        <span class="block sm:inline text-red-700">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="flex items-center col-span-2">
                                    <input type="file" wire:model="editedPhoto" class="">
                                    @error('editedPhoto')
                                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-full relative mt-1"
                                            role="alert">
                                            <strong class="font-bold">Ups!</strong>
                                            <span class="block sm:inline text-red-700">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div
                                    class="flex items-center justify-center bg-gray-100 border border-gray-200 rounded-md h-32">
                                    @if ($editedPhoto)
                                        @if (is_string($editedPhoto))
                                            {{-- Mostrar la imagen existente si $editedPhoto es una URL --}}
                                            <img src="{{ Storage::url($editedPhoto) }}" alt="Foto de perfil"
                                                class="h-28 w-28 rounded-full object-cover">
                                        @else
                                            {{-- Mostrar la imagen temporal si se ha cargado una nueva --}}
                                            <img src="{{ $editedPhoto->temporaryUrl() }}" alt="Foto de perfil"
                                                class="h-28 w-28 rounded-full object-cover">
                                        @endif
                                    @else
                                        <span class="text-center text-xs">No se ha cargado ninguna imagen</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="flex mt-2 justify-center">
                            <button type="submit"
                                class="flex items-center bg-green-600 text-white px-3 py-2 rounded-full">
                                Actualizar datos
                            </button>
                        </div>
                    </form>
                @else
                    <header class="flex justify-between">
                        <h1>{{ $item->name }}</h1>
                        <div>
                            <i wire:click="edit({{ $item }})"
                                class="fas fa-edit cursor-pointer text-blue-500">editar</i>
                            <i wire:click="destroy({{ $item }})"
                                class="fas fa-trash cursor-pointer text-red-500 ml-3">eliminar</i>
                        </div>
                    </header>
                @endif
            </div>
        </article>
    @endforeach

    <article class="mt-4">
        <hr>
        <form wire:submit.prevent="store" class="mt-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <input placeholder="Ingresa el nombre del profesor" wire:model="name"
                        class="block w-full py-3 px-3 border border-gray-300 bg-white rounded-full shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    @error('name')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-full relative mt-1"
                            role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline text-red-700">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div>
                    <input type="email" placeholder="Ingresa el correo del profesor" wire:model="email"
                        class="block w-full py-3 px-3 border border-gray-300 bg-white rounded-full shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    @error('email')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-full relative mt-1"
                            role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline text-red-700">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 my-4">
                <div>
                    <input placeholder="Ingresa el telefono del profesor" wire:model="phone"
                        class="block w-full py-3 px-3 border border-gray-300 bg-white rounded-full shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    @error('phone')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-full relative mt-1"
                            role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline text-red-700">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div>
                    <input placeholder="Ingresa un enlace del profesor" wire:model="url"
                        class="block w-full py-3 px-3 border border-gray-300 bg-white rounded-full shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    @error('url')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-full relative mt-1"
                            role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline text-red-700">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <textarea placeholder="Ingresa la descripcion del profesor" wire:model="description"
                        class="block w-full h-32 py-3 px-3 border border-gray-300 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"></textarea>
                    @error('description')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-full relative mt-1"
                            role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline text-red-700">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="grid grid-cols-3">
                    <div class="flex items-center col-span-2">
                        <input type="file" wire:model="photo" class="">
                        @error('photo')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-full relative mt-1"
                                role="alert">
                                <strong class="font-bold">Ups!</strong>
                                <span class="block sm:inline text-red-700">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="flex items-center justify-center bg-gray-100 border border-gray-200 rounded-md h-32">
                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" alt="Foto de perfil"
                                class="h-28 w-28 rounded-full object-cover">
                        @else
                            <span class="text-center text-xs">No se ha cargado ninguna imagen</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex mt-4 justify-center">
                <button class="flex items-center bg-blue-600 text-white px-3 py-2 rounded-full">
                    Agregar Profesor
                </button>
            </div>
        </form>
    </article>
</section>
