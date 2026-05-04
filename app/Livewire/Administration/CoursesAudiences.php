<?php

namespace App\Livewire\Administration;

use App\Models\Audience;
use App\Models\Course;
use Livewire\Component;

class CoursesAudiences extends Component
{
    public $course, $audience, $name, $editedName;

    public function mount(Course $course)
    {
        $this->course = $course;

        $this->audience = new Audience();
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
        
        $this->course->audiences()->create([
            'name' => $this->name
        ]);

        $this->reset('name');

        $this->course = Course::find($this->course->id);
    }

    public function edit(Audience $audience)
    {
        $this->audience = $audience;
        $this->editedName = $audience->name;
    }

    public function update()
    {
        $this->validate([
            'editedName' => 'required',
        ]);

        $this->audience->name = $this->editedName; // Actualizar el nombre del audience
        $this->audience->save();

        $this->audience = new Audience(); // Reiniciar el objeto audience
        $this->editedName = ''; // Limpiar el nombre editado

        $this->course = Course::find($this->course->id); // Recargar el curso
    }

    public function destroy(Audience $audience)
    {
        $audience->delete();

        $this->course = Course::find($this->course->id);
    }
    
    public function render()
    {
        return view('livewire.administration.courses-audiences');
    }
}
