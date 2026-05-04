<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Imports\StudentsCertificatesImport;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class StudentsController extends Controller
{
    public function index()
    {
        return view('administrador.students.index');
    }

    public function edit(Student $student)
    {
        return view('administrador.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            /* 'email' => 'required|email|unique:students,email,'.$student->id, */
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'document_type' => 'required|in:Cedula,Pasaporte,Cedula Extranjera',
            'document' => 'required|string|digits:10|unique:students,document,'.$student->id,
            'status' => 'required|in:Cursando,Pendiente,Retirado,Terminado',
            'codigo' => 'nullable'
        ]);

        $student->update($validated);

        return redirect()->route('administrador.students.index')->with('menssage', 'Estudiante actualizado con éxito.');
    }

    public function create()
    {
        return view('administrador.students.create', ['student' => new Student]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:students,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'document_type' => 'required|in:Cedula,Pasaporte,Cedula Extranjera',
            'document' => 'required|string|digits:10|unique:students,document',
            'status' => 'required|in:Cursando,Pendiente,Retirado,Terminado',
            'codigo' => 'nullable'
        ]);

        $validated['user_id'] = Auth::user()->id;

        $student = Student::create($validated);

        return redirect()->route('administrador.students.index')->with('menssage', 'Estudiante '.$student->name.' se ha creado con éxito.');
    }

    public function import()
    {
        return view('administrador.students.import'); // Renderiza la vista del formulario de importación
    }

    public function enrollet(Request $request)
    {
        // Validar que se suba un archivo Excel
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        try {
            Excel::import(new StudentsCertificatesImport, $request->file('file'));
            
            return redirect()->back()->with('success', 'Importación exitosa');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error en la importación: ' . $e->getMessage());
        }
    }

    /* public function destroy(student $student)
    {
        $student->update(['status' => 'Retirado']);
        return redirect()->route('administrador.students.index')->with('menssage', 'Estudiante '. $student->fisrt_name .' se ha eliminado con éxito.');
    } */
}
