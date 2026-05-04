<?php

namespace App\Livewire\Administration;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CoursesTeachers extends Component
{
    use WithFileUploads;

    public $course, $teacher;
    public $name, $email, $phone, $description, $url, $photo;
    public $editedName, $editedEmail, $editedPhone, $editedDescription, $editedUrl, $editedPhoto;

    public function mount(Course $course)
    {
        $this->course = $course;

        $this->teacher = new Teacher();
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'description' => 'nullable',
            'url' => 'nullable|url',
            'photo' => 'nullable|image|max:1024',
        ];/* 
        $messages =[
            'name.required' => 'Este campo es requerido por favor ingresa un nombre',
        ]; */

        $this->validate($rules/* , $messages */);

        $teacher = $this->course->teachers()->create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'description' => $this->description,
            'url' => $this->url,
        ]);

        // Si se cargó una imagen, guárdala
        if ($this->photo) {
            $url = $this->photo->store('teachers'); // Guardar la imagen en el directorio 'teachers'

            // Crear la relación de la imagen
            $teacher->image()->create(['url' => $url]);
        }

        $this->reset('name', 'email', 'phone', 'description', 'url', 'photo');

        $this->course = Course::find($this->course->id);
    }

    public function edit(Teacher $teacher)
    {
        $this->teacher = $teacher;
        $this->editedName = $teacher->name;
        $this->editedEmail = $teacher->email;
        $this->editedPhone = $teacher->phone;
        $this->editedDescription = $teacher->description;
        $this->editedUrl = $teacher->url;
        $this->editedPhoto = $teacher->image ? $teacher->image->url : null;
    }

    public function update()
    {
        $this->validate([
            'editedName' => 'required',
            'editedEmail' => 'required|email',
            'editedPhone' => 'nullable',
            'editedDescription' => 'nullable',
            'editedUrl' => 'nullable|url',
            'editedPhoto' => $this->editedPhoto instanceof TemporaryUploadedFile ? 'nullable|image|max:1024' : 'nullable',
        ]);

        $this->teacher->name = $this->editedName; // Actualizar el nombre del teacher
        $this->teacher->email = $this->editedEmail; // Actualizar el email del teacher
        $this->teacher->phone = $this->editedPhone; // Actualizar el teléfono del teacher
        $this->teacher->description = $this->editedDescription; // Actualizar la descripción del teacher
        $this->teacher->url = $this->editedUrl; // Actualizar la URL del teacher
        $this->teacher->save();

        // Si se subió una nueva imagen, reemplazar la anterior
        if ($this->editedPhoto && $this->editedPhoto instanceof TemporaryUploadedFile) {
            $url = $this->editedPhoto->store('teachers');

            if ($this->teacher->image) {
                // Eliminar la imagen anterior
                Storage::delete($this->teacher->image->url);
                // Actualizar la imagen
                $this->teacher->image->update(['url' => $url]);
            } else {
                // Crear una nueva imagen
                $this->teacher->image()->create(['url' => $url]);
            }
        }

        $this->teacher = new Teacher(); // Reiniciar el objeto teacher
        $this->reset('editedName', 'editedEmail', 'editedPhone', 'editedDescription', 'editedUrl', 'editedPhoto');
        $this->course = Course::find($this->course->id); // Recargar el curso
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->image) {
            Storage::delete($teacher->image->url);
            $teacher->image()->delete();
        }

        $teacher->delete();
        $this->course = Course::find($this->course->id);
    }

    public function render()
    {
        return view('livewire.administration.courses-teachers');
    }
}
