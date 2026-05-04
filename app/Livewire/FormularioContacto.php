<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Mail\FormContact;
use App\Models\Course;
use Illuminate\Support\Facades\Mail;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Attributes\Layout;

class FormularioContacto extends Component
{
    use InteractsWithBanner;

    #[Validate('required', message: 'El campo nombre no puede estar vacío')]
    #[Validate('min:10', message: 'El campo nombre debe ser mayor a 10 caracteres')]
    public $name;

    #[Validate('required', message: 'El campo correo no puede estar vacío')]
    #[Validate('email', message: 'El correo no es válido')]
    public $email;

    #[Validate('required', message: 'El campo teléfono no puede estar vacío')]
    #[Validate('numeric', message: 'El campo documento debe incluir solo números')]
    #[Validate('min:10', message: 'El campo teléfono debe contener 10 números')]
    public $phone;

    #[Validate('required', message: 'El campo documento no puede estar vacío')]
    #[Validate('numeric', message: 'El campo documento debe incluir solo números')]
    #[Validate('min:10', message: 'El campo documento debe contener 10 números')]
    public $document;

    #[Validate('required', message: 'Debe elegir al menos una tecnología de interés')]
    public $tecnologia;

    #[Validate('required', message: 'El campo descripción no puede estar vacío')]
    #[Validate('min:10', message: 'El campo descripción debe contener 10 números')]
    public $description;

    #[Layout('layouts.app')]
    public function render()
    {
        $tecnologias = Course::select('id', 'status', 'title')->where('status', Course::PUBLICADO)/* ->pluck('title') */->get();
        return view('livewire.formulario-contacto', [
            'tecnologias' => $tecnologias,
        ]);
    }

    public function envioFormulario()
    {
        $data = $this->validate();

        try {
            Mail::to(env('MAIL_FROM_ADDRESS'))
                ->send(new FormContact($data));

            $this->resetFormulario();

            $this->dispatch('alert', [
                'type' => 'success',
                'title' => 'Atención',
                'message' => 'Gracias por escribirnos su mensaje fue enviado con exito!',
            ]);

            return back();
        } catch (\Throwable $th) {
            $this->resetFormulario();

            $this->dispatch('alert', [
                'type' => 'info',
                'title' => 'Atención',
                'message' => 'Hubo un problema al enviar el mensaje: ' . $th->getMessage(),
            ]);

            return back();
        }
    }

    public function resetFormulario()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->document = '';
        $this->tecnologia = '';
        $this->description = '';
    }
}
