<?php

namespace App\Livewire\Administration;

use App\Models\Advantages;
use App\Models\Course;
use Livewire\Component;

class CoursesAdvantages extends Component
{
    public $course, $advantage;
    public $name, $icon;
    public $editedName, $editedIcon;

    public function mount(Course $course)
    {
        $this->course = $course;

        $this->advantage = new Advantages();
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'icon' => 'required'
        ];/* 
        $messages =[
            'name.required' => 'Este campo es requerido por favor ingresa un nombre',
        ]; */

        $this->validate($rules/* , $messages */);

        $advantage = $this->course->advantages()->create([
            'name' => $this->name,
            'icon' => $this->icon
        ]);


        $this->reset('name', 'icon');

        $this->course = Course::find($this->course->id);
    }

    public function edit(Advantages $advantage)
    {
        $this->advantage = $advantage;
        $this->editedName = $advantage->name;
        $this->editedIcon = $advantage->icon;
    }

    public function update()
    {
        $this->validate([
            'editedName' => 'required',
            'editedIcon' => 'required'
        ]);

        $this->advantage->name = $this->editedName; // Actualizar el nombre del advantage
        $this->advantage->icon = $this->editedIcon; // Actualizar el icono
        $this->advantage->save();

        $this->advantage = new Advantages(); // Reiniciar el objeto advantage
        $this->reset('editedName', 'editedIcon');
        $this->course = Course::find($this->course->id); // Recargar el curso
    }

    public function destroy(Advantages $advantage)
    {
        $advantage->delete();
        $this->course = Course::find($this->course->id);
    }

    public function render()
    {
        return view('livewire.administration.courses-advantages');
    }
}
