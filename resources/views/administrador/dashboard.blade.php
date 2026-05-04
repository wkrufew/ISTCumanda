<x-administrador-layout>
    <h1 class="text-xl text-center font-semibold pt-2">
        METRICAS DE LA APLICACION
    </h1>
   <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="h-32 md:h-40 bg-purple-500 border-3 border-purple-900 flex justify-center items-center rounded-md relative">
            <div class="text-center">
                <div class="text-3xl font-semibold text-white flex items-center space-x-2">
                    <svg class="mt-1 w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                    <span>{{ $data['usuarios'] }}</span>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 w-36 rounded-tr-full h-10 bg-purple-800/80 z-10 flex justify-center items-center">
                <div class="font-semibold text-white">Usarios</div>
            </div>
        </div>
        <div class="h-32 md:h-40 bg-sky-500 border-3 border-sky-900 flex justify-center items-center rounded-md relative">
            <div class="text-center">
                <div class="text-3xl font-semibold text-white flex items-center space-x-2">
                    <svg class="mt-1 w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M0 80C0 53.5 21.5 32 48 32l96 0c26.5 0 48 21.5 48 48l0 16 192 0 0-16c0-26.5 21.5-48 48-48l96 0c26.5 0 48 21.5 48 48l0 96c0 26.5-21.5 48-48 48l-96 0c-26.5 0-48-21.5-48-48l0-16-192 0 0 16c0 1.7-.1 3.4-.3 5L272 288l96 0c26.5 0 48 21.5 48 48l0 96c0 26.5-21.5 48-48 48l-96 0c-26.5 0-48-21.5-48-48l0-96c0-1.7 .1-3.4 .3-5L144 224l-96 0c-26.5 0-48-21.5-48-48L0 80z"/></svg>
                    <div>{{ $data['roles'] }}</div>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 w-36 rounded-tr-full h-10 bg-sky-800/80 z-10 flex justify-center items-center">
                <div class="font-semibold text-white">Roles</div>
            </div>
        </div>
        <div class="h-32 md:h-40 bg-lime-500 border-3 border-lime-900 flex justify-center items-center rounded-md relative">
            <div class="text-center">
                <div class="text-3xl font-semibold text-white flex items-center space-x-2">
                    <svg class="mt-1 w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM80 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 96c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 96l192 0c17.7 0 32 14.3 32 32l0 64c0 17.7-14.3 32-32 32L96 352c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32zm0 32l0 64 192 0 0-64L96 256zM240 416l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                    <div>{{ $data['certificados'] }}</div>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 w-36 rounded-tr-full h-10 bg-lime-800/80 z-10 flex justify-center items-center">
                <div class="font-semibold text-white">Certificaciones</div>
            </div>
        </div>
        <div class="h-32 md:h-40 bg-indigo-500 border-3 border-indigo-900 flex justify-center items-center rounded-md relative">
            <div class="text-center">
                <div class="text-3xl font-semibold text-white flex items-center space-x-2">
                    <svg class="mt-1 w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M4.1 38.2C1.4 34.2 0 29.4 0 24.6C0 11 11 0 24.6 0L133.9 0c11.2 0 21.7 5.9 27.4 15.5l68.5 114.1c-48.2 6.1-91.3 28.6-123.4 61.9L4.1 38.2zm503.7 0L405.6 191.5c-32.1-33.3-75.2-55.8-123.4-61.9L350.7 15.5C356.5 5.9 366.9 0 378.1 0L487.4 0C501 0 512 11 512 24.6c0 4.8-1.4 9.6-4.1 13.6zM80 336a176 176 0 1 1 352 0A176 176 0 1 1 80 336zm184.4-94.9c-3.4-7-13.3-7-16.8 0l-22.4 45.4c-1.4 2.8-4 4.7-7 5.1L168 298.9c-7.7 1.1-10.7 10.5-5.2 16l36.3 35.4c2.2 2.2 3.2 5.2 2.7 8.3l-8.6 49.9c-1.3 7.6 6.7 13.5 13.6 9.9l44.8-23.6c2.7-1.4 6-1.4 8.7 0l44.8 23.6c6.9 3.6 14.9-2.2 13.6-9.9l-8.6-49.9c-.5-3 .5-6.1 2.7-8.3l36.3-35.4c5.6-5.4 2.5-14.8-5.2-16l-50.1-7.3c-3-.4-5.7-2.4-7-5.1l-22.4-45.4z"/></svg>
                    <div>{{ $data['asignaciones'] }}</div>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 w-36 rounded-tr-full h-10 bg-indigo-800/80 z-10 flex justify-center items-center">
                <div class="font-semibold text-white">Asignaciones</div>
            </div>
        </div>
   </div>
</x-administrador-layout>