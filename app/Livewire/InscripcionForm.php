<?php

namespace App\Livewire;

use App\Models\Inscription;
use Livewire\Component;

class InscripcionForm extends Component
{
    public $nombre;
    public $apellido;
    public $correo;
    public $cedula;
    public $telefono;
    public $course;

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'correo' => 'required|email|max:255',
        'cedula' => 'required|numeric',
        'telefono' => 'required|numeric|digits:10',
    ];

    public function mount($course)
    {
        $this->course = $course;
    }

    public function updatedNombre()
    {
        $this->nombre = strtoupper($this->nombre);
    }
    
    public function updatedApellido()
    {
        $this->apellido = strtoupper($this->apellido);
    }

    public function updatedCedula()
    {
        $this->validateOnly('cedula');
    }

    public function envioInscripcion()
    {
        $this->validate();
        
        // Validación personalizada para la cédula
        if (!$this->validarCedulaEcuador($this->cedula)) {
            $this->addError('cedula', 'La cédula ingresada no es válida.');
            return;
        }
        // Validar los datos del formulario
        
        try {
            Inscription::create([
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'correo' => $this->correo,
                'cedula' => $this->cedula,
                'telefono' => $this->telefono,
                'course_id' => $this->course->id,
                'period_id' => $this->course->period->id,  // Agregar el periodo del curso
            ]);
    

            session()->flash('alert', [
                'message' => 'Se ha inscrito correctamente',
                'type' => 'success',
                'title' => 'Registro exitoso',
            ]);

            $this->reset(['nombre', 'apellido', 'correo', 'cedula', 'telefono']);

            return redirect()->route('course.show', $this->course);

        } catch (\Exception $e) {
            session()->flash('alert', [
                'message' => 'Error al inscribirse',
                'type' => 'error',
                'title' => 'Error',
            ]);

            return back();
        }        
    }

    public function render()
    {
        return view('livewire.inscripcion-form');
    }

    // Función para validar la cédula ecuatoriana
    public function validarCedulaEcuador($cedula)
    {
        // Verificar si tiene 10 dígitos
        if (strlen($cedula) != 10) {
            return false;
        }

        // Extraer los dos primeros dígitos (provincia)
        $provincia = substr($cedula, 0, 2);
        if ($provincia < 1 || ($provincia > 24 && $provincia != 30)) {
            return false;
        }

        // Extraer los dígitos
        $digitos = str_split($cedula);
        $coeficiente = [2, 1, 2, 1, 2, 1, 2, 1, 2];
        $suma = 0;

        // Aplicar algoritmo de módulo 10
        for ($i = 0; $i < 9; $i++) {
            $valor = $digitos[$i] * $coeficiente[$i];
            if ($valor >= 10) {
                $valor -= 9;
            }
            $suma += $valor;
        }

        // Obtener el dígito verificador
        $residuo = $suma % 10;
        $digitoVerificador = $residuo == 0 ? 0 : 10 - $residuo;

        // Comparar con el décimo dígito
        return $digitoVerificador == $digitos[9];
    }

}
