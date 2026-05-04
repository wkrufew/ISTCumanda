<?php

namespace App\Livewire;

use App\Models\Enrollment;
use App\Models\Estudiante;
use App\Models\Periodo;
use App\Models\Program;
use App\Models\Semester;
use Livewire\Component;

class SearchCalificacion extends Component
{
    // Propiedades de búsqueda y filtros
    public $idNumber = '';
    public $estudiante = null;
    public $periodos = [];
    public $programas = [];
    public $semestres = [];

    // Selecciones
    public $selectedPeriodoId = null;
    public $selectedProgramId = null;
    public $selectedSemesterId = null;

    // Resultados
    public $calificaciones = [];
    public $enrollment = null;
    public $message = '';
    public $showResults = false;

    // Propiedades para validación
    protected $rules = [
        'idNumber' => 'required|digits:10',
    ];

    // Métodos de ciclo de vida
    public function mount()
    {
        $this->reset();
    }

    // Métodos de búsqueda
    public function verificarEstudiante()
    {
        //reiniciar la variable de error 
        $this->message = '';
        $this->showResults = false;

        $this->validate();

        $this->estudiante = Estudiante::where('id_number', $this->idNumber)
            ->where('is_active', true)
            ->first();

        if (!$this->estudiante) {
            $this->message = 'No se encontró ningún estudiante con esa cédula.';
            $this->showResults = false;
            return;
        }

        // Cargar periodos, programas y semestres asociados al estudiante
        $this->loadFilterOptions();
    }

    public function loadFilterOptions()
    {
        if (!$this->estudiante) {
            return;
        }

        // Obtener programas y periodos únicos donde el estudiante está matriculado
        $enrollments = Enrollment::where('estudiante_id', $this->estudiante->id)->get();

        $programIds = $enrollments->pluck('program_id')->unique()->toArray();
        $periodoIds = $enrollments->pluck('periodo_id')->unique()->toArray();

        $this->programas = Program::whereIn('id', $programIds)->where('is_active', true)->get();
        $this->periodos = Periodo::whereIn('id', $periodoIds)->where('is_active', true)->get();

        // Preseleccionar el periodo actual si existe
        $currentPeriodo = Periodo::where('is_current', true)->first();
        if ($currentPeriodo && in_array($currentPeriodo->id, $periodoIds)) {
            $this->selectedPeriodoId = $currentPeriodo->id;
            $this->updatedSelectedPeriodoId();
        }
    }

    public function updatedSelectedPeriodoId()
    {
        $this->selectedProgramId = null;
        $this->selectedSemesterId = null;
        $this->calificaciones = [];
        $this->showResults = false;

        if (!$this->selectedPeriodoId || !$this->estudiante) {
            return;
        }

        // Filtrar programas por periodo seleccionado
        $enrollments = Enrollment::where('estudiante_id', $this->estudiante->id)
            ->where('periodo_id', $this->selectedPeriodoId)
            ->get();

        $programIds = $enrollments->pluck('program_id')->unique()->toArray();
        $this->programas = Program::whereIn('id', $programIds)->where('is_active', true)->get();
    }

    public function updatedSelectedProgramId()
    {
        $this->selectedSemesterId = null;
        $this->calificaciones = [];
        $this->showResults = false;

        if (!$this->selectedProgramId || !$this->selectedPeriodoId || !$this->estudiante) {
            return;
        }

        // Obtener semestres disponibles para el programa y periodo seleccionados
        $enrollments = Enrollment::where('estudiante_id', $this->estudiante->id)
            ->where('periodo_id', $this->selectedPeriodoId)
            ->where('program_id', $this->selectedProgramId)
            ->get();

        $semesterIds = $enrollments->pluck('semester_id')->unique()->toArray();
        $this->semestres = Semester::whereIn('id', $semesterIds)->orderBy('order')->get();
    }

    public function consultarNotas()
    {
        //dd('Boton habilitado');
        if (!$this->selectedPeriodoId || !$this->selectedProgramId || !$this->selectedSemesterId) {
            $this->message = 'Por favor seleccione todos los filtros requeridos.';
            return;
        }

        // Buscar la matrícula específica
        $this->enrollment = Enrollment::where('estudiante_id', $this->estudiante->id)
            ->where('periodo_id', $this->selectedPeriodoId)
            ->where('program_id', $this->selectedProgramId)
            ->where('semester_id', $this->selectedSemesterId)
            ->first();

        if (!$this->enrollment) {
            $this->message = 'No se encontró ninguna matrícula con los criterios seleccionados.';
            $this->showResults = false;
            return;
        }

        // Cargar las calificaciones con las materias relacionadas
        $this->calificaciones = $this->enrollment->grades()->with('subject')->get();

        // Calcular promedios finales si no están calculados
        /* foreach ($this->calificaciones as $calificacion) {
            if (is_null($calificacion->final_grade)) {
                $calificacion->calculateFinalGrade();
            }
        } */

        //agregar validacion si es que no tiene notas count($this->calificaciones) <= 0    $this->calificaciones->isEmpty()
        if (count($this->calificaciones) <= 0) {
            $this->message = 'No se encontraron calificaciones para la matrícula seleccionada.';
            $this->showResults = false;
            return;
        }



        $this->showResults = true;
    }

    public function resetFilters()
    {
        $this->reset([
            'idNumber',
            'estudiante',
            'periodos',
            'programas',
            'semestres',
            'selectedPeriodoId',
            'selectedProgramId',
            'selectedSemesterId',
            'calificaciones',
            'enrollment',
            'message',
            'showResults'
        ]);
    }

    /* deseo crear un objeto calificaciones para que no mede problemas en la vista por el momento de pruebas que tenga nombre y nota */
    public function render()
    {
        return view('livewire.search-calificacion');
    }
}

/* public function mount()
{
    $this->calificaciones = collect([
        (object) ['materia' => 'Matemáticas', 'calificacion' => 10],
        (object) ['materia' => 'Historia', 'calificacion' => 8],
        (object) ['materia' => 'Ciencias', 'calificacion' => 9],
        (object) ['materia' => 'Literatura', 'calificacion' => 7],
        (object) ['materia' => 'Física', 'calificacion' => 6],
    ]);

    $this->carreras = collect([
        (object) ['nombre' => 'Ingeniería en Sistemas', 'id' => 1],
        (object) ['nombre' => 'Ingeniería en Electrónica', 'id' => 2],
        (object) ['nombre' => 'Ingeniería en Mecánica', 'id' => 3],
        (object) ['nombre' => 'Ingeniería en Civil', 'id' => 4],
    ]);
} */