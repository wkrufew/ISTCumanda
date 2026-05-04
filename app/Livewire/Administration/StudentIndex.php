<?php

namespace App\Livewire\Administration;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentIndex extends Component
{
    
    use WithPagination;
    
    public $search;


    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        
        $students = Student::where('is_active', 1)
                                ->where(function ($query) {
                                    $query->where('name', 'LIKE', '%' . $this->search . '%')
                                          ->orWhere('document', 'LIKE', '%' . $this->search . '%');
                                })
                                ->paginate(10);
        return view('livewire.administration.student-index', compact('students'));
    }

    public function delete(Student $student)
    {
        /* $student = student::find($id); */
        /* $student->delete(); */
        $student->update(['is_active' => false]);
        //dd($student);
        session()->flash('message', 'Estudiante '. $student->name .' se ha eliminado con éxito.');
    }
}
