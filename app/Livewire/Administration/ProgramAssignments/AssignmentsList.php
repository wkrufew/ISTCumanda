<?php

namespace App\Livewire\Administration\ProgramAssignments;

use App\Models\Periodo;
use App\Models\Program;
use App\Models\ProgramSubject;
use App\Models\Semester;
use Livewire\Component;

use Livewire\Attributes\Layout;

class AssignmentsList extends Component
{
    public Program $carrera;
    public $periodo_id = '';
    public $semester_id = '';

    #[Layout('layouts.administrador')]
    public function render()
    {
        $periods = Periodo::orderBy('name')->get();
        $semesters = Semester::orderBy('name')->get();

        $assignments = ProgramSubject::with(['periodo', 'semester', 'subject'])
            ->where('program_id', $this->carrera->id)
            ->when($this->periodo_id, fn($q) => $q->where('periodo_id', $this->periodo_id))
            ->when($this->semester_id, fn($q) => $q->where('semester_id', $this->semester_id))
            ->get();

        return view('livewire.administration.program-assignments.assignments-list', [
            'assignments' => $assignments,
            'periods' => $periods,
            'semesters' => $semesters,
        ]);
    }
}
