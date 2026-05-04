<x-app-layout>
    <div id="inicio" class="-mt-20 relative">
        <div id="certificados"></div>
        <img class="w-full h-48 object-cover object-center"
            src="https://images.pexels.com/photos/4144923/pexels-photo-4144923.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            alt="portada">
        <div class="absolute inset-0 bg-black bg-opacity-50 z-20"></div>
        <div class="absolute top-32 md:top-28 text-center w-full z-30 text-xl font-semibold text-white">
            LISTADO DE CURSOS
        </div>
    </div>
    <div class="contenedor pb-14">
        @livewire('courses-filter')
    </div>
</x-app-layout>
