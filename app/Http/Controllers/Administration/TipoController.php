<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
        return view('administrador.tipos.index', compact('tipos'));
    }

    public function create()
    {
        return view('administrador.tipos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tipos',
        ], [
            'name.required' => 'El campo nombre es requerido',
            'name.unique' => 'La categoría ingresada ya existe',
        ]);

        $tipo = Tipo::create($request->all());
        $notificacion = "La categoría {$tipo->name} se ha añadido correctamente";

        return redirect()->route('administrador.tipos.index')->with('notificacion', $notificacion);
    }

    public function show(Tipo $tipo)
    {
        return view('administrador.tipos.show', compact('tipo'));
    }

    public function edit(Tipo $tipo)
    {
        return view('administrador.tipos.edit', compact('tipo'));
    }

    public function update(Request $request, Tipo $tipo)
    {
        $request->validate([
            'name' => 'required|unique:tipos,name,' . $tipo->id,
        ], [
            'name.required' => 'El campo nombre es requerido',
        ]);

        $tipo->update($request->all());
        $notificacion = "La categoría {$tipo->name} se ha actualizado correctamente";

        return redirect()->route('administrador.tipos.index')->with('notificacion', $notificacion);
    }

    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        $notificacion = "La categoría {$tipo->name} se ha eliminado correctamente";

        return redirect()->route('administrador.tipos.index')->with('notificacion', $notificacion);
    }
}
