<?php

namespace App\Livewire\Administration;

use App\Models\Estudiante;
use Livewire\Component;
use Livewire\WithPagination;

class EstudiantesIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $estudiantes = Estudiante::where(function ($query) {
            $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                ->orWhere('id_number', 'LIKE', '%' . $this->search . '%');
        })
            ->paginate(10);

        return view('livewire.administration.estudiantes-index', compact('estudiantes'));
    }

    public function toggleStatus(Estudiante $estudiante)
    {
        try {
            $estudiante->is_active = !$estudiante->is_active;
            $estudiante->save();

            $this->dispatch('alert', [
                'message' => $estudiante->is_active ? 'Estudiante habilitado con éxito.' : 'Estudiante inhabilitado con éxito.',
                'type' => 'success',
                'title' => 'Actualización exitosa'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('alert', [
                'message' => 'Error al actualizar el estado del estudiante' /* . $e->getMessage() */,
                'type' => 'error',
                'title' => 'Error'
            ]);
        }
    }

    public function delete(Estudiante $estudiante)
    {
        dd($estudiante);
        $estudiante->delete();

        session()->flash('message', 'Estudiante ' . $estudiante->name . ' se ha eliminado con éxito.');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
