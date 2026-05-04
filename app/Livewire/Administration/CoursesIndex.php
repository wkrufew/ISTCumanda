<?php

namespace App\Livewire\Administration;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $courses = Course::where('title', 'LIKE', '%' . $this->search . '%') 
                           ->latest('id')
                            ->paginate(5);

        return view('livewire.administration.courses-index', compact('courses'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function toggleStatusc($course)
    {     
        $course = Course::find($course['id']); 
        try {
            // Cambia el status entre 'publicado' (1) y 'borrador' (2)
            $course->status = $course->status == 1 ? 2 : 1;
            $course->save();
    
            $this->dispatch('alert', [
                'message' => $course->status == 1 ? 'Curso en borrador.' : 'Curso publicado con éxito.',
                'type' => 'success',
                'title' => 'Actualización exitosa'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('alert', [
                'message' => 'Error al actualizar el estado del curso',
                'type' => 'error',
                'title' => 'Error'
            ]);
        }
    }
}