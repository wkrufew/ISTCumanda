<?php

namespace App\Livewire\Administration\ProgramAssignments;

use App\Models\Periodo;
use App\Models\Program;
use App\Models\ProgramSubject;
use App\Models\Semester;
use App\Models\Subject;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AssignmentsEdit extends Component
{
    public Program $carrera;
    public ProgramSubject $asignacion;

    public $semester_id;
    public $periodo_id;
    public $selected_subjects = [];

    public $semesters = [];
    public $periodos = [];
    public $subjects = [];

    public function mount(Program $carrera, ProgramSubject $asignacion)
    {
        $this->carrera = $carrera;
        $this->asignacion = $asignacion;

        $this->semester_id = $asignacion->semester_id;
        $this->periodo_id = $asignacion->periodo_id;
        $this->selected_subjects = [$asignacion->subject_id];

        $this->semesters = Semester::all();
        $this->periodos = Periodo::all();
        $this->subjects = Subject::all();
    }

    public function update()
    {
        $this->validate([
            'semester_id' => 'required|exists:semesters,id',
            'periodo_id' => 'required|exists:periodos,id',
            'selected_subjects' => 'required|array|min:1',
            'selected_subjects.*' => 'exists:subjects,id',
        ]);

        // Se elimina la asignación previa
        $this->asignacion->delete();

        // Creamos nueva(s) asignación(es)
        foreach ($this->selected_subjects as $subject_id) {
            ProgramSubject::firstOrCreate([
                'program_id' => $this->carrera->id,
                'subject_id' => $subject_id,
                'semester_id' => $this->semester_id,
                'periodo_id' => $this->periodo_id,
            ]);
        }

        session()->flash('message', 'Asignación actualizada exitosamente.');

        return redirect()->route('administrador.carreras.assignments', $this->carrera);
    }

    #[Layout('layouts.administrador')]
    public function render()
    {
        return view('livewire.administration.program-assignments.assignments-edit');
    }
}
