<section>
    <h1 class="text-2xl font-bold">VENTAJAS DEL CURSO</h1>

    <hr class="mt-2 mb-6">

    @foreach ($course->advantages as $item)
        <article class="px-4 py-2 rounded-md bg-white border border-gray-200 mb-2 shadow shadow-green-600/50">
            <div class="">
                @if ($advantage->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <input wire:model.live="editedName" placeholder="Ingresa el nombre de la ventaja"
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
                                <input wire:model.live="editedIcon" placeholder="Ingresa el icono"
                                    class="block w-full py-2 px-3 border border-gray-50 bg-gray-100 rounded-full shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                @error('editedIcon')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mt-1"
                                        role="alert">
                                        <strong class="font-bold">Ups!</strong>
                                        <span class="block sm:inline text-green-700">{{ $message }}</span>
                                    </div>
                                @enderror
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
                        <span class="bg-verde rounded-full p-2">{!! $item->icon !!}</span>
                        <div>
                            <i wire:click="edit({{ $item }})"
                                class="fas fa-edit cursor-pointer text-blue-500"></i>
                            <i wire:click="destroy({{ $item }})"
                                class="fas fa-trash cursor-pointer text-red-500 ml-3"></i>
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
                    <input placeholder="Ingresa la ventaja" wire:model="name"
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
                    <input type="text" placeholder="Ingresa el icono" wire:model="icon"
                        class="block w-full py-3 px-3 border border-gray-300 bg-white rounded-full shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    @error('icon')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-full relative mt-1"
                            role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline text-red-700">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="flex mt-4 justify-center">
                <button class="flex items-center bg-blue-600 text-white px-3 py-2 rounded-full">
                    Agregar Ventaja
                </button>
            </div>
        </form>
    </article>
</section>
