<?php

namespace App\Livewire\Administration;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\certificate;

class CertificateForm extends Component
{
    public $student;
    public $certificate;
    public $title;
    public $subtitle;
    public $description;
    public $date_start;
    public $date_end;
    public $hours;

    protected $rules = [
        'title' => 'required|string|max:255',
        'subtitle' => 'required|string|max:255',
        'description' => 'required|string',
        'date_start' => 'required|date',
        'date_end' => 'required|date|after_or_equal:date_start',
        'hours' => 'required|integer|min:1',
    ];

    public function mount($student)
    {
        $this->student = $student;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveCertificate()
    {
        $this->validate();

        $data = $this->only(['title', 'subtitle', 'description', 'date_start', 'date_end', 'hours']);

        if ($this->certificate && $this->certificate instanceof certificate) {
            $this->certificate->update($data);
        } else {
            $this->student->certificates()->create($data);
        }

        $this->reset(['title', 'subtitle', 'description', 'date_start', 'date_end', 'hours', 'certificate']);
        $this->dispatch('certificate-saved');
    }

    public function resetCampos()
    {
        $this->reset(['title', 'subtitle', 'description', 'date_start', 'date_end', 'hours', 'certificate']);
    }

    #[On('certificate-selected')]
    public function loadCertificate($certificadoId)
    {
        $this->certificate = Certificate::find($certificadoId['id']);
        $this->fill($this->certificate);
    }
    public function render()
    {
        return view('livewire.administration.certificate-form');
    }
}
