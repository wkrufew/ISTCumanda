<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SearchCertificate extends Component
{
    #[Validate('required', message: 'El campo documento no puede estar vacío')]
    #[Validate('digits:10', message: 'El campo debe tener 10 caracteres')]
    public $search;
    
    public bool $notStudent = false;
    public $studentsData = null; 

    public function searchStudent()
    {
        $this->validate();
        $this->loadStudent();
    }

    public function loadStudent()
    {
        $student = Student::where('document',  $this->search )->first();
        if ($student) {
            $this->studentsData = $student;
        } else {
            $this->notStudent = true;
            $this->studentsData = null;
        }
        $this->reset('search');
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.search-certificate');
    }
}
