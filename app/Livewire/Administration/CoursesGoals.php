<?php

namespace App\Livewire\Administration;

use App\Models\Course;
use App\Models\Goal;
use Livewire\Component;

class CoursesGoals extends Component
{
    public $course, $goal, $name, $editedName;

    public function mount(Course $course)
    {
        $this->course = $course;

        $this->goal = new Goal();
    }

    public function render()
    {
        return view('livewire.administration.courses-goals');
    }

    public function store()
    {
        $rules = [
            'name' => 'required'
        ];
        $messages =[
            'name.required' => 'Este campo es requerido por favor ingresa un nombre',
        ];

        $this->validate($rules, $messages);
        
        $this->course->goals()->create([
            'name' => $this->name
        ]);

        $this->reset('name');

        $this->course = Course::find($this->course->id);
    }

    public function edit(Goal $goal)
    {
        $this->goal = $goal;
        $this->editedName = $goal->name;
    }

    public function update()
    {
        $this->validate([
            'editedName' => 'required',
        ]);

        $this->goal->name = $this->editedName; // Actualizar el nombre del goal
        $this->goal->save();

        $this->goal = new Goal(); // Reiniciar el objeto goal
        $this->editedName = ''; // Limpiar el nombre editado

        $this->course = Course::find($this->course->id); // Recargar el curso
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();

        $this->course = Course::find($this->course->id);
    }
}
