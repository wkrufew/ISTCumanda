<section>
    <h1 class="text-2xl font-bold">METAS DEL CURSO</h1>

    <hr class="mt-2 mb-6">

    @foreach ($course->goals as $item)
        <article class="px-4 py-2 rounded-full bg-white border border-gray-200 mb-2 shadow shadow-green-600/50">
            <div class="">
                @if ($goal->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model.live="editedName" placeholder="Ingresa el nombre de una meta del curso..."
                            class="block w-full py-2 px-3 border border-gray-50 bg-gray-100 rounded-full shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                        @error('editedName')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mt-1"
                                role="alert">
                                <strong class="font-bold">Ups!</strong>
                                <span class="block sm:inline text-green-700">{{ $message }}</span>
                            </div>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between">
                        <h1>{{ $item->name }}</h1>
                        <div class="flex items-center shrink-0">
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

    <article class="">
        <form wire:submit.prevent="store">
            <input placeholder="Ingresa el nombre de una meta del curso..." wire:model="name"
                class="block w-full py-3 px-3 border border-gray-300 bg-white rounded-full shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
            @error('name')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-full relative mt-1"
                    role="alert">
                    <strong class="font-bold">Ups!</strong>
                    <span class="block sm:inline text-red-700">{{ $message }}</span>
                </div>
            @enderror
            <div class="flex mt-2 justify-center">
                <button class="flex items-center bg-blue-600 text-white px-3 py-2 rounded-full">
                    Agregar meta
                </button>
            </div>
        </form>
    </article>
</section>
