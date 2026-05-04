<div>
    <h2>Crear Certificado</h2>
    <form wire:submit.prevent="saveCertificate">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="col-span-1 md:col-span-2 w-full">
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="title" class="block text-sm font-medium">Título</label>
                        <input type="text" id="title" wire:model="title" class="w-full px-3 py-2 border rounded">
                        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="subtitle" class="block text-sm font-medium">Subtítulo</label>
                        <input type="text" id="subtitle" wire:model="subtitle" class="w-full px-3 py-2 border rounded">
                        @error('subtitle') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex space-x-4 mt-4">
                    <div class="w-1/3">
                        <label for="date_start" class="block text-sm font-medium">Fecha de inicio</label>
                        <input type="date" id="date_start" wire:model="date_start" class="w-full px-3 py-2 border rounded">
                        @error('date_start') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-1/3">
                        <label for="date_end" class="block text-sm font-medium">Fecha de finalización</label>
                        <input type="date" id="date_end" wire:model="date_end" class="w-full px-3 py-2 border rounded">
                        @error('date_end') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-1/3">
                        <label for="hours" class="block text-sm font-medium">Horas de duración</label>
                        <input type="number" id="hours" wire:model="hours" class="w-full px-3 py-2 border rounded">
                        @error('hours') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="">
                <label for="description" class="block text-sm font-medium">Descripción</label>
                <textarea id="description" rows="4" wire:model="description" class="w-full px-3 py-2 border rounded"></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mt-4 flex justify-between mx-1">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full text-sm font-medium">{{ $certificate ? 'Actualizar' : 'Crear' }} Certificado</button>
            @if ($certificate)
                <button wire:click="resetCampos" type="button" class="bg-black text-white px-4 py-2 rounded-full text-sm font-medium">Borrar Campos</button>
            @endif
        </div>
    </form>

    <h2>Certificados Existentes</h2>
    <ul>
        @foreach($certificates as $certificate)
            <li>{{ $certificate->title }} ({{ $certificate->date_start }} - {{ $certificate->date_end }})</li>
        @endforeach
    </ul>
</div>