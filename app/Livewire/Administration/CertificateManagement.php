<?php

namespace App\Livewire\Administration;

use App\Models\Certificate;
use Livewire\Component;

class CertificateManagement extends Component
{
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

    public function saveCertificate()
    {
        $this->validate();

        Certificate::create($this->only(['title', 'subtitle', 'description', 'date_start', 'date_end', 'hours']));

        $this->reset(['title', 'subtitle', 'description', 'date_start', 'date_end', 'hours']);
        $this->dispatch('certificate-created');
    }
    
    public function render()
    {
        $certificates = Certificate::paginate();
        
        return view('livewire.administration.certificate-management', compact('certificates'));
    }
}
