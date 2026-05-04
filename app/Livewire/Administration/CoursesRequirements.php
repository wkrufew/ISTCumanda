<?php

namespace App\Livewire\Administration;

use App\Models\Course;
use App\Models\Requirement;
use Livewire\Component;

class CoursesRequirements extends Component
{
    public $course, $requirement, $name, $editedName;

    public function mount(Course $course)
    {
        $this->course = $course;

        $this->requirement = new Requirement();
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
        
        $this->course->requirements()->create([
            'name' => $this->name
        ]);

        $this->reset('name');

        $this->course = Course::find($this->course->id);
    }

    public function edit(Requirement $requirement)
    {
        $this->requirement = $requirement;
        $this->editedName = $requirement->name;
    }

    public function update()
    {
        $this->validate([
            'editedName' => 'required',
        ]);

        $this->requirement->name = $this->editedName; // Actualizar el nombre del requirement
        $this->requirement->save();

        $this->requirement = new Requirement(); // Reiniciar el objeto requirement
        $this->editedName = ''; // Limpiar el nombre editado

        $this->course = Course::find($this->course->id); // Recargar el curso
    }

    public function destroy(Requirement $requirement)
    {
        $requirement->delete();

        $this->course = Course::find($this->course->id);
    }
    public function render()
    {
        return view('livewire.administration.courses-requirements');
    }
}
