<div>
    <div class="container overflow-hidden">
        <div class="flex flex-col shadow-lg">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <div class="py-4 px-6 flex">
                            <input wire:model.live="search" type="search" class="form-input flex-1 shadow-lg  rounded-full"
                                placeholder="Escriba el nombre de un curso...">
                            <a class="px-3 py-2 rounded-full bg-blue-600 text-white font-medium ml-2"
                                href="{{ route('administrador.courses.create') }}">Nuevo
                                Curso</a>
                        </div>
                        @if (session('notificacion'))
                            <div x-data="{ open: true }">
                                <div x-show="open"
                                    class="bg-blue-500 border border-blue-600 text-blue-100 px-4 py-3 rounded relative"
                                    role="alert">
                                    <strong class="font-bold">Ok!</strong>
                                    <span class="block sm:inline">{{ session('notificacion') }}</span>
                                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg x-on:click="open = false" class="fill-current h-6 w-6 text-white"
                                            role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <title>Close</title>
                                            <path
                                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        @endif
                        @if ($courses->count())
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Titulo
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Periodo
                                        </th>
                                        {{--  <th scope="col"
                                            class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Fechas
                                        </th> --}}
                                        <th scope="col"
                                            class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Estado
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Opciones</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td class="px-3 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        @isset($course->image)
                                                            <img class="h-10 w-10 rounded-full object-cover object-center"
                                                                src="{{ Storage::url($course->image->url) }}"
                                                                alt="">
                                                        @else
                                                            <img id="picture"
                                                                class="h-10 w-10 rounded-full object-cover object-center"
                                                                src="https://images.pexels.com/photos/4325451/pexels-photo-4325451.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                                                alt="">
                                                        @endisset
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $course->title }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{ $course->category->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    @if ($course->period !== null)
                                                        {{ $course->period->nombre }}
                                                    @endif
                                                </div>
                                            </td>
                                            {{--  <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $course->start_date->isoFormat('D [de] MMMM, Y') }} <br>
                                                    {{ $course->end_date->isoFormat('D [de] MMMM, Y') }}</div>
                                            </td> --}}
                                            <td
                                                class="px-6 py-4 whitespace-no-wrap text-left border-b border-gray-300 text-sm leading-5 font-medium">
                                                <div>
                                                    @if ($course->status == 2)
                                                        <span
                                                            class="px-2 text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Publicado</span>
                                                    @else
                                                        <span
                                                            class="px-2 text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Borrador</span>
                                                    @endif
                                                </div>
                                                <label class="relative inline-flex cursor-pointer items-center mt-1">
                                                    <input id="switch" type="checkbox" class="peer sr-only"
                                                        id="switch-{{ $course->id }}"
                                                        @if ($course->status == 2) checked @endif
                                                        wire:click="toggleStatusc({{ $course }})" />
                                                    <div
                                                        class="peer h-6 w-11 rounded-full border bg-slate-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-green-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-green-300">
                                                    </div>
                                                </label>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('administrador.courses.edit', $course) }}"
                                                    class="text-indigo-600 hover:text-indigo-900">
                                                    <svg class="w-5 h-5 fill-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <!-- More items... -->
                                </tbody>
                            </table>
                            @if ($courses->hasPages())
                                <div class="px-6 py-4">
                                    {{ $courses->links() }}
                                </div>
                            @endif
                        @else
                            <div class="px-6 py-4">
                                No se encuentran registros con ese nombre
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('alert', (eventData) => {

                    const data = eventData[0];

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: data.type,
                        title: data.message,
                    });
                });
            });
        </script>
    @endpush
</div>
