<?php

namespace App\Livewire\Administration;

use App\Models\Certificate;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CertificateIndex extends Component
{
    use WithPagination;
    
    public $search;

    public function toggleStatus(Certificate $certificate)
    {
        try {
            $certificate->isActive = !$certificate->isActive;
            $certificate->save();
    
            $this->dispatch('alert', [
                'message' => $certificate->isActive ? 'Certificado habilitado con éxito.' : 'Certificado inhabilitado con éxito.',
                'type' => 'success',
                'title' => 'Actualización exitosa'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('alert', [
                'message' => 'Error al actualizar el estado del usuario' /* . $e->getMessage() */,
                'type' => 'error',
                'title' => 'Error'
            ]);
        }
    }

    public function render()
    {
        $certificates = Certificate::where('title', 'LIKE', '%' . $this->search . '%')
                                ->latest()
                                ->paginate(10);

        return view('livewire.administration.certificate-index', compact('certificates'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
