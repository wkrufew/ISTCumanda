<?php

namespace App\Livewire\Administration\ProgramAssignments;

use App\Models\Periodo;
use App\Models\Program;
use App\Models\ProgramSubject;
use App\Models\Semester;
use App\Models\Subject;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AssignmentsCreate extends Component
{
    public Program $carrera;

    public $selectedPeriod = '';
    public $selectedSemester = '';
    public $selectedSubjects = [];

    public $periods = [];
    public $semesters = [];
    public $subjects = [];

    public function mount(Program $carrera)
    {
        $this->carrera = $carrera;
        //$this->programSubjects = [];
        $this->semesters = Semester::all();
        $this->periods = Periodo::all();
        $this->subjects = Subject::all();
    }

    public function store()
    {
        $this->validate([
            'selectedSemester' => 'required|exists:semesters,id',
            'selectedPeriod' => 'required|exists:periodos,id',
            'selectedSubjects' => 'required|array|min:1',
            'selectedSubjects.*' => 'exists:subjects,id',
        ]);

        foreach ($this->selectedSubjects as $subjectId) {
            ProgramSubject::firstOrCreate([
                'program_id' => $this->carrera->id,
                'periodo_id' => $this->selectedPeriod,
                'semester_id' => $this->selectedSemester,
                'subject_id' => $subjectId,
            ]);
        }

        session()->flash('message', 'Materias asignadas correctamente.');
        return redirect()->route('administrador.carreras.assignments', $this->carrera);
    }

    #[Layout('layouts.administrador')]
    public function render()
    {
        return view('livewire.administration.program-assignments.assignments-create');
    }
}
