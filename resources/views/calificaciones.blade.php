<x-app-layout>
    <div class="-mt-20 relative">
        <div id="certificados"></div>
        <img class="w-full h-56 object-cover object-center"
            src="https://images.pexels.com/photos/4144923/pexels-photo-4144923.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            alt="portada">
        <div class="absolute inset-0 bg-black bg-opacity-50 z-20"></div>
        <div class="absolute top-32 md:top-28 text-center w-full z-30 text-xl font-semibold text-white">
            VERIFICACIÓN DE CALIFICACIONES
        </div>
    </div>

    <div class="max-w-full mx-3 md:mx-10 md:px-4 mt-4 mb-16">
        <livewire:search-calificacion />
    </div>

</x-app-layout>
