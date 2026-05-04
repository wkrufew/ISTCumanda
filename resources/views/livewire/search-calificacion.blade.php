<div>
    <div class="max-w-7xl mx-auto mt-6 mb-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="col-span-3 md:col-span-3 lg:col-span-1">
                <div class="bg-white p-4 rounded-2xl shadow-lg border border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800 text-center">CONSULTA DE NOTAS OBTENIDAS</h2>
                    <form wire:submit.prevent="verificarEstudiante">
                        <div class="mb-4">
                            <label for="idNumber" class="block text-sm font-medium text-gray-800 ml-1">
                                Ingrese su número de cédula <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="idNumber" wire:model.defer="idNumber"
                                class="mt-1 focus:ring-verde focus:border-verde block w-full shadow-md sm:text-sm border-gray-200 rounded-full"
                                placeholder="Cédula sin guiones ej: 1303640104">
                            @error('idNumber')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-center">
                            <button type="submit"
                                class="bg-verde hover:bg-neutral-800 text-white font-semibold py-2 px-4 rounded-full transition border-2 border-verde shadow-lg">
                                Verificar
                            </button>
                        </div>
                    </form>

                    <div class="text-neutral-400 text-xs mt-4">
                        <span class="font-semibold">Nota: </span> Si no aparecen las calificaciones, por favor
                        comuníquese con el departamento de
                        secretaría.
                    </div>
                </div>
            </div>
            <div
                class="col-span-3 md:col-span-3 lg:col-span-2 bg-white md:p-4 rounded-2xl shadow-lg border border-gray-100 h-full">
                @if ($estudiante)
                    <h2 class="text-lg font-semibold text-gray-800 text-center">ESTIMADO/A
                        {{ strtoupper($estudiante->fullName()) }}</h2>

                    {{-- FILTRO DE LA CARRERA Y LOS SEMESTRES --}}
                    <div class="w-full p-2 my-4 rounded-xl bg-neutral-800">
                        <div class="grid grid-cols-5 gap-4">
                            <div>
                                <label class="block text-sm text-gray-200 ml-1">
                                    Periodo <span class="text-red-500">*</span>
                                </label>
                                <select wire:model.live="selectedPeriodoId"
                                    class="mt-1 focus:ring-verde focus:border-verde block w-full shadow-md sm:text-sm border-gray-200 rounded-full">
                                    <option value="">Seleccione un periodo</option>
                                    @foreach ($periodos as $periodo)
                                        <option value="{{ $periodo->id }}">{{ $periodo->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-5 md:col-span-2">
                                <label for="search" class="block text-sm text-gray-200 ml-1">Tecnología
                                    <span class="text-red-600 font-medium">(*)</span></label>
                                {{-- INPUT CON TODAS LAS CARRERAS --}}
                                {{-- <select wire:model="carrera" name="carrera" id="carrera"
                                    class="mt-1 focus:ring-verde focus:border-verde block w-full shadow-md sm:text-sm border-gray-200 rounded-full">
                                    <option value="">Seleccione una carrera</option>
                                    @foreach ($carreras as $carrera)
                                        <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                                    @endforeach
                                </select> --}}
                                <select wire:model.live="selectedProgramId"
                                    class="mt-1 focus:ring-verde focus:border-verde block w-full shadow-md sm:text-sm border-gray-200 rounded-full"
                                    @if (count($programas) === 0) disabled @endif>
                                    <option value="">Seleccione una carrera</option>
                                    @foreach ($programas as $programa)
                                        <option value="{{ $programa->id }}">{{ $programa->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-5 md:col-span-2">
                                <label for="search" class="block text-sm text-gray-200 ml-1">Semestre
                                    <span class="text-red-600 font-medium">(*)</span>
                                </label>
                                <div class="flex gap-4">
                                    <select wire:model.live="selectedSemesterId"
                                        class="mt-1 focus:ring-verde focus:border-verde disabled:bg-gray-200 block w-full shadow-md sm:text-sm border-gray-200 rounded-full"
                                        @if (count($semestres) === 0) disabled @endif>
                                        <option value="">Seleccione un semestre</option>
                                        @foreach ($semestres as $semestre)
                                            <option value="{{ $semestre->id }}">{{ $semestre->name }}</option>
                                        @endforeach
                                    </select>

                                    <button type="button" wire:click="consultarNotas"
                                        class="bg-verdeclaro disabled:bg-gray-400 disabled:text-gray-600 disabled:cursor-not-allowed hover:bg-verde text-white font-semibold text-sm py-2 px-4 rounded-full transition"
                                        @if (!$selectedSemesterId) disabled @endif>
                                        Verificar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($message)
                        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @endif
                    @if ($showResults && count($calificaciones) > 0)
                        <div class="overflow-x-auto">
                            <h3 class="font-semibold text-center text-sm mb-2">ACTA DE CALIFICACIONES</h3>
                            <table
                                class="min-w-full divide-y divide-gray-200 overflow-hidden rounded-xl border border-neutral-800 bg-neutral-800 shadow-md cursor-default">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="pl-2 py-3 text-left text-xs font-medium text-neutral-200 uppercase tracking-wider">
                                            Materia
                                        </th>
                                        <th scope="col"
                                            class="px-1 py-3 text-center text-xs font-medium text-neutral-200 uppercase tracking-wider">
                                            Asistencia
                                        </th>
                                        <th scope="col"
                                            class="px-1 py-3 text-center text-xs font-medium text-neutral-200 uppercase tracking-wider">
                                            Nota 1
                                        </th>
                                        <th scope="col"
                                            class="px-1 py-3 text-center text-xs font-medium text-neutral-200 uppercase tracking-wider">
                                            Nota 2
                                        </th>
                                        <th scope="col"
                                            class="px-1 py-3 text-center text-xs font-medium text-neutral-200 uppercase tracking-wider">
                                            Nota 3
                                        </th>
                                        {{-- <th scope="col"
                                            class="px-1 py-3 text-center text-xs font-medium text-neutral-200 uppercase tracking-wider">
                                            Nota 4
                                        </th> --}}
                                        <th scope="col"
                                            class="px-1 py-3 text-center text-xs font-medium text-neutral-200 uppercase tracking-wider">
                                            Promedio
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($calificaciones as $calificacion)
                                        <tr class="hover:bg-neutral-800 text-gray-900 hover:text-neutral-200 group">
                                            <td class="pl-2 py-2 whitespace-nowrap">
                                                <div class="text-sm font-medium">{{ $calificacion->subject->name }}
                                                </div>
                                            </td>
                                            <td
                                                class="px-1 py-2 whitespace-nowrap bg-gray-100 group-hover:bg-neutral-800 group-hover:text-white text-black">
                                                <div class="text-sm text-center font-medium">
                                                    {{ $calificacion->attendance ?? '-' }}
                                                </div>
                                            </td>
                                            <td class="px-1 py-2 whitespace-nowrap">
                                                <div class="text-sm text-center font-medium">
                                                    {{ $calificacion->grade1 ?? '-' }}
                                                </div>
                                            </td>
                                            <td class="px-1 py-2 whitespace-nowrap">
                                                <div class="text-sm text-center font-medium">
                                                    {{ $calificacion->grade2 ?? '-' }}
                                                </div>
                                            </td>
                                            <td class="px-1 py-2 whitespace-nowrap">
                                                <div class="text-sm text-center font-medium">
                                                    {{ $calificacion->grade3 ?? '-' }}
                                                </div>
                                            </td>
                                            <td class="px-1 py-2 whitespace-nowrap bg-neutral-800">
                                                @php
                                                    $promedio = 0;
                                                    $notas = [
                                                        $calificacion->attendance,
                                                        $calificacion->grade1,
                                                        $calificacion->grade2,
                                                        $calificacion->grade3,
                                                        /* $calificacion->grade4, */
                                                    ];
                                                    $notas = array_filter($notas, function ($nota) {
                                                        return $nota !== null;
                                                    });
                                                    if (count($notas) > 0) {
                                                        $promedio = array_sum($notas) / count($notas);
                                                    }
                                                @endphp
                                                <div
                                                    class="text-sm text-white text-center flex flex-col items-center justify-center">
                                                    <div class="mb-1 font-semibold">
                                                        {{ number_format($promedio, 2) }}
                                                    </div>
                                                    @if ($promedio < 7)
                                                        <span
                                                            class="px-2 py-1 rounded-full bg-red-500 text-white text-xs">Reprobado</span>
                                                    @elseif ($promedio >= 7 && $promedio < 10)
                                                        <span
                                                            class="px-2 py-1 rounded-full bg-verdeclaro text-white text-xs">Aprobado</span>
                                                    @elseif ($promedio == 10)
                                                        <span
                                                            class="px-2 py-1 rounded-full bg-blue-700 text-white text-xs">Aprobado</span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div>
                            <div class="bg-green-100 border border-verdeclaro text-verde px-3 py-2 rounded text-sm"
                                role="alert">
                                <span class="block sm:inline font-medium">
                                    Ingrese todos los filtros para poder visualizar su acta de calificaciones. Si no
                                    aparecen las calificaciones, por favor comuníquese
                                    con el departamento de secretaría.
                                </span>
                            </div>
                        </div>
                    @endif
                @elseIf ($idNumber)
                    <div class="text-center flex items-center justify-center h-full">
                        <span class="text-red-500 font-semibold">No se encontraron calificaciones</span>
                    </div>
                @else
                    <div class="text-center flex items-center justify-center h-full">
                        <span class="text-verde font-semibold">Para poder ver el acta de calificaciones ingrese su
                            número de cédula</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
