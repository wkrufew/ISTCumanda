<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Subject;
use Illuminate\Http\Request;

class MateriaNController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Subject::all();
        return view('administrador.materias-n.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materia = new Subject(['is_active' => true]); // Objeto vacío
        return view('administrador.materias-n.create', compact('materia'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:subjects,code',
            'description' => 'nullable|string|max:1000',
            'credits' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        Subject::create($request->all());
        return redirect()->route('administrador.materias.index')->with('success', 'Materia creada exitosamente.');
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
    public function edit(Subject $materia)
    {
        return view('administrador.materias-n.edit', compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $materia)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:programs,code,' . $materia->id,
            'description' => 'nullable|string|max:1000',
            'credits' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $materia->update($request->all());
        return redirect()->route('administrador.materias.index')->with('success', 'Materia actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $materia)
    {
        $materia->delete();
        return redirect()->route('administrador.materias.index')->with('success', 'Materia eliminada.');
    }
}
