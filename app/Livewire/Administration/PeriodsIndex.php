<?php

namespace App\Livewire\Administration;

use App\Models\Period;
use Livewire\Component;
use Livewire\WithPagination;

class PeriodsIndex extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {
        $periods = Period::where('nombre', 'LIKE', '%' . $this->search . '%')->latest()->paginate(10);

        return view('livewire.administration.periods-index', compact('periods'));
    }

    public function toggleStatus(Period $period)
    {     
        try {
            $period->activo = !$period->activo;
            $period->save();
    
            $this->dispatch('alert', [
                'message' => $period->activo ? 'Periodo habilitado con éxito.' : 'Periodo inhabilitado con éxito.',
                'type' => 'success',
                'title' => 'Actualización exitosa'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('alert', [
                'message' => 'Error al actualizar el estado del Periodo' /* . $e->getMessage() */,
                'type' => 'error',
                'title' => 'Error'
            ]);
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
