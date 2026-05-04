<div class="bg-white p-4 mt-2 rounded-lg">
    <div class="bg-gray-100 p-2 md:p-4 rounded-md">
        <h2 class="text-lg font-semibold text-center uppercase mb-2">Información del estudiante</h2>
        <div class=" flex justify-center text-sm">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4">
                <p class="col-span-2 md:col-span-1"><strong>Nombres:</strong> {{ $student->name }}
                    {{ $student->last_name }}</p>
                <p class="hidden md:block"><strong>Tipo Documento:</strong> {{ $student->document_type }}</p>
                <p><strong>Documento:</strong> {{ $student->document }}</p>
                <p><strong>Teléfono:</strong> {{ $student->phone }}</p>
            </div>
        </div>
    </div>

    <div class="bg-gray-100 p-4 my-4 rounded-md">
        <h3 class="text-lg font-semibold mb-2 uppercase text-center">ASIGNACION DE CERTIFICADOS</h3>
        <div class="flex justify-center items-center space-x-2">
            <form wire:submit.prevent="assignCertificate" class="mt-2">
                <div class="flex justify-center space-x-3 items-center">
                    <select wire:model.live="selectedCertificateId"
                        class="text-sm w-48 border border-gray-400  p-2 rounded-full {{ $errors->has('selectedCertificateId') ? ' border-red-500' : '' }}">
                        <option value="">Seleccione un certificado</option>
                        @foreach ($availableCertificates as $certificate)
                            <option value="{{ $certificate->id }}">{{ $certificate->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-2 mt-2">
                    @if ($selectedCertificateId)
                        <div class="flex justify-center space-x-3 items-center">
                            <input type="date" wire:model="start_date"
                                class="border p-1 rounded-full text-sm {{ $errors->has('start_date') ? ' border-red-500' : '' }}">

                            @error('start_date')
                                <span class="error text-red-600 py-2 text-sm">{{ $message }}</span>
                            @enderror
                            <input type="date" wire:model="end_date"
                                class="border p-1 rounded-full text-sm {{ $errors->has('end_date"') ? ' border-red-500' : '' }}">

                            @error('end_date"')
                                <span class="error text-red-600 py-2 text-sm">{{ $message }}</span>
                            @enderror

                            <!-- Campo para subir el archivo PDF -->
                            <input type="file" wire:model="file"
                                class="border p-1 rounded-full text-sm {{ $errors->has('file') ? 'border-red-500' : '' }}">

                            @error('file')
                                <span class="error text-red-600 py-2 text-sm">{{ $message }}</span>
                            @enderror

                            <button type="submit"
                                class="bg-green-600 text-sm text-white px-4 py-2 rounded-full">Asignar</button>
                        </div>
                    @endif
                </div>
            </form>
        </div>
        <div class="flex justify-center">
            @error('selectedCertificateId')
                <span class="error text-red-600 py-2 text-sm ml-2">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="bg-gray-100 p-4 rounded-md">
        <h3 class="text-lg font-semibold mb-2 text-center uppercase">Listado de certificados del estudiante</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white overflow-hidden rounded-md">
                <thead>
                    <tr class="text-sm text-left">
                        <th class="py-2 px-4 border-b">No.</th>
                        <th class="py-2 px-4 border-b">Título</th>
                        <th class="py-2 px-4 border-b">Periodo</th>
                        <th class="py-2 px-4 border-b">Horas</th>
                        <th class="py-2 px-4 border-b">Asignacion</th>
                        <th class="py-2 px-4 border-b">PDF</th>
                        <th class="py-2 px-4 border-b">Opción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificates as $index => $certificate)
                        <tr class="text-sm">
                            <td class="py-1 px-2 border-b">{{ $certificate->id }}</td>
                            <td class="py-1 px-2 border-b">{{ $certificate->title }}</td>
                            <td class="py-1 px-2 border-b whitespace-nowrap">
                                {{ $certificate->date_start->isoFormat('D/M/Y') }} -
                                {{ $certificate->date_end->isoFormat('D/M/Y') }}</td>
                            <td class="py-1 px-2 border-b">{{ $certificate->hours }}</td>
                            <td>
                                @if ($editingCertificateId === $certificate->id)
                                    <input type="date" wire:model="editingAssignedAt"
                                        class="border p-1 rounded-md text-sm">
                                    <button wire:click="updateCertificateAssignment"
                                        class="bg-green-500 text-white p-1 rounded-full">
                                        <svg class="w-3 h-3 fill-white" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                        </svg>
                                    </button>
                                    <button wire:click="cancelEdit"
                                        class="bg-gray-500 text-white p-1 rounded-full ml-1">
                                        <svg class="w-3 h-3 fill-white" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512">
                                            <path
                                                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                        </svg>
                                    </button>
                                @else
                                    <div wire:ignore>
                                        @isset($certificate->pivot->assigned_at)
                                            <span>
                                                {{ $certificate->assigned_at_formatted }}
                                            </span>
                                        @endisset
                                        <button wire:click="editCertificate({{ $certificate->id }})"
                                            class="bg-blue-500 text-white p-1 rounded-full">
                                            <svg class="w-3 h-3 fill-white" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                            </svg>
                                        </button>
                                    </div>
                                @endif
                            </td>
                            <td class="py-1 px-2 border-b text-center">
                                @isset($certificate->pivot->file_path)
                                    @if ($certificate->pivot->file_path)
                                        <a href="{{ Storage::url($certificate->pivot->file_path) }}" target="_blank"
                                            rel="noopener noreferrer">
                                            <svg class="size-4 fill-red-600 text-center" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                                            </svg>
                                        </a>
                                    @endif
                                @endisset
                            </td>
                            <td class="py-1 px-2 border-b text-center">
                                <button wire:click="removeCertificate({{ $certificate->id }})"
                                    class="bg-red-500 text-white p-2 ml-1 rounded-full">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
