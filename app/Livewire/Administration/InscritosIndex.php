<?php

namespace App\Livewire\Administration;

use App\Models\Inscription;
use Livewire\Component;
use Livewire\WithPagination;

class InscritosIndex extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {
        $inscritos = Inscription::where('nombre', 'LIKE', '%' . $this->search . '%')
                ->orWhere('apellido', 'LIKE', '%' . $this->search . '%')
                ->orWhere('cedula', 'LIKE', '%' . $this->search . '%')
                ->latest()
                ->paginate(10);

        return view('livewire.administration.inscritos-index', compact('inscritos'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(Inscription $inscrito)
    {
        //dd($id);
        //$inscrito = Inscription::findOrFail($id);
        $inscrito->delete();
    }
}
