<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemestreNController extends Controller
{
    public function index()
    {
        $semestres = Semester::all();
        return view('administrador.semestres-n.index', compact('semestres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semestre = new Semester(['is_active' => true]); // Objeto vacío
        return view('administrador.semestres-n.create', compact('semestre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:semesters,code',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        Semester::create($request->all());
        return redirect()->route('administrador.semestres.index')->with('success', 'Semestre creado exitosamente.');
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
    public function edit(Semester $semestre)
    {
        return view('administrador.semestres-n.edit', compact('semestre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semester $semestre)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:semesters,code,' . $semestre->id,
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $semestre->update($request->all());
        return redirect()->route('administrador.semestres.index')->with('success', 'Semestre actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semestre)
    {
        $semestre->delete();
        return redirect()->route('administrador.semestres.index')->with('success', 'Semestre eliminado.');
    }
}
