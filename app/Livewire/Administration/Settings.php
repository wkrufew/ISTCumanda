<?php

namespace App\Livewire\Administration;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Settings extends Component
{
    public $state = [];

    public $stateOld = [];

    public function mount()
    {
        $setting = Setting::first();

        if ($setting) {
            $this->state = $setting->toArray();
            $this->stateOld = $this->state;
        } else {
            $this->state = [];
            $this->stateOld = [];
        }
    }

    public function updateSetting()
    {
        $setting = Setting::first();

        if ($setting) {
            // Comparamos los arrays eliminando las claves que no queremos comparar
            $stateToCompare = array_diff_key($this->state, array_flip(['created_at', 'updated_at']));
            $stateOldToCompare = array_diff_key($this->stateOld, array_flip(['created_at', 'updated_at']));

            if ($stateToCompare != $stateOldToCompare) {
                $setting->update($this->state);
                Cache::forget('settings');

                $this->dispatch('alert', [
                    'message' => 'Los datos de configuración se guardaron con éxito!',
                    'type' => 'success',
                    'title' => 'Excelente!'
                ]);

                // Actualizamos stateOld con los nuevos valores
                $this->stateOld = $this->state;
            } else {
                $this->dispatch('alert', [
                    'message' => 'No se han realizado cambios en el formulario',
                    'type' => 'info',
                    'title' => 'Atención'
                ]);
            }
        } else {
            Setting::create($this->state);
            Cache::forget('settings');

            $this->dispatch('alert', [
                'message' => 'Se ha creado una nueva configuración!',
                'type' => 'success',
                'title' => 'Excelente!'
            ]);

            // Actualizamos stateOld con los nuevos valores
            $this->stateOld = $this->state;
        }
    }

    #[Layout('layouts.administrador')]
    public function render()
    {
        return view('livewire.administration.settings');
    }
}
