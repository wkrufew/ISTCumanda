<?php

namespace App\Livewire\Administration;

use App\Models\Certificate;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

class StudentCertificates extends Component
{
    use WithFileUploads;
    public $student;
    public $certificates;
    public $selectedCertificateId = null;
    /* public $selectedCertificateId; */
    public $start_date;
    public $end_date;
    public $file;
    public $editingCertificateId;
    public $editingAssignedAt;
    public $isActive = false;

    public function mount(Student $student)
    {
        $this->student = $student;
        $this->loadCertificates();
    }

    public function loadCertificates()
    {
        $this->certificates = $this->student->certificates()->orderBy('date_start', 'desc')->get();
    }

    public function updatedSelectedCertificateId($value)
    {
        if ($value) {
            $this->isActive = true;
        } else {
            $this->isActive = false;
        }
    }

    public function assignCertificate()
    {
        $this->validate([
            'selectedCertificateId' => 'required|exists:certificates,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'file' => 'required|file|mimes:pdf|max:2048' // Validación para el archivo PDF
        ], [
            'selectedCertificateId.required' => 'Por favor selecciones un certificado.',
            'selectedCertificateId.exists' => 'El certificado no existe.',
            'start_date.required' => 'La fecha de inicio es obligatoria.',
            'start_date.date' => 'La fecha de inicio debe ser una fecha válida.',
            'end_date.required' => 'La fecha de fin es obligatoria.',
            'end_date.date' => 'La fecha de fin debe ser una fecha válida.',
            'end_date.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la fecha de inicio.',
            'file.required' => 'El archivo PDF es obligatorio.',
            'file.mimes' => 'El archivo debe ser un PDF.',
            'file.max' => 'El tamaño máximo del archivo es 2MB.'
        ]);

        //obtener el nombre del archivo
        $nombre_archivo = $this->student->document. '-' . $this->selectedCertificateId . '.pdf';
        //$originalName = $this->file->getClientOriginalName();
        // Subir el archivo al almacenamiento
        $filePath = $this->file->storeAs('CERTIFICATES', $nombre_archivo, 'public');
        
        // Verificar si el archivo se subió correctamente
        if (!$filePath) {
            session()->flash('error', 'Error al subir el archivo.');
            return;
        }

        $this->student->certificates()->attach($this->selectedCertificateId, [
            'assigned_at' => now(),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'file_path' => $filePath // Guardar la ruta del archivo en file_path
        ]);

        $this->reset('selectedCertificateId');
        $this->loadCertificates();
        $this->dispatch('certificate-assigned');
    }

    public function removeCertificate($certificateId)
    {
        $this->student->certificates()->detach($certificateId);
        //eliminar archivo
        $nombre_archivo = $this->student->document. '-' . $certificateId . '.pdf';
        $filePath = 'CERTIFICATES/' . $nombre_archivo;

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }

        $this->loadCertificates();
    }

    public function editCertificate($certificateId)
    {
        $this->editingCertificateId = $certificateId;
        $certificate = $this->student->certificates()->find($certificateId);
        $this->editingAssignedAt = $certificate->pivot->assigned_at;
    }

    public function updateCertificateAssignment()
    {
        $this->validate([
            'editingAssignedAt' => 'required|date'
        ]);

        $this->student->certificates()->updateExistingPivot($this->editingCertificateId, [
            'assigned_at' => $this->editingAssignedAt
        ]);

        $this->reset('editingCertificateId', 'editingAssignedAt');
        $this->loadCertificates();
    }

    public function cancelEdit()
    {
        $this->loadCertificates();
        $this->reset('editingCertificateId', 'editingAssignedAt');
    }
    
    #[Layout('layouts.administrador')] 
    public function render()
    {
        $assignedCertificates = $this->certificates;
        $availableCertificates = Certificate::where('isActive', 1)->whereNotIn('id', $assignedCertificates->pluck('id'))->get();

        return view('livewire.administration.student-certificates', compact('assignedCertificates', 'availableCertificates'));
    }

/*     protected function getListeners()
    {
        return ['certificate-saved' => 'loadCertificates'];
    } */
}
