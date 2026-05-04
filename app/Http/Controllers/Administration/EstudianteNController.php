<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteNController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('administrador.estudiantes-n.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estudiante = new Estudiante(['is_active' => true]); // Objeto vacío
        return view('administrador.estudiantes-n.create', compact('estudiante'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'document_type' => 'required|in:Cedula,Pasaporte,Cedula Extranjera',
            'id_number' => 'required|string|max:255|unique:estudiantes,id_number',
            'email' => 'required|email|max:255|unique:estudiantes,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'status' => 'required|in:Cursando,Pendiente,Retirado,Terminado',
            'is_active' => 'nullable|boolean',
        ]);

        Estudiante::create($request->all());
        return redirect()->route('administrador.estudiantes.index')->with('success', 'Estudiante creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        return view('administrador.estudiantes-n.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'document_type' => 'required|in:Cedula,Pasaporte,Cedula Extranjera',
            'id_number' => 'required|string|max:255|unique:estudiantes,id_number,' . $estudiante->id,
            'email' => 'required|email|max:255|unique:estudiantes,email,' . $estudiante->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'status' => 'required|in:Cursando,Pendiente,Retirado,Terminado',
            'is_active' => 'nullable|boolean',
        ]);

        $estudiante->update($request->all());
        return redirect()->route('administrador.estudiantes.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
        // Verificar si el estudiante tiene inscripciones antes de eliminarlo
        /* if ($estudiante->inscripciones()->exists()) {
            return redirect()->route('administrador.estudiantes.index')->with('error', 'No se puede eliminar el estudiante porque tiene inscripciones.');
        } */

        $estudiante->delete();

        return redirect()->route('administrador.estudiantes.index')->with('success', 'Estudiante eliminada.');
    }
}
