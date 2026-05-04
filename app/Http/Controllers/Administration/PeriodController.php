<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index()
    {
        return view('administrador.periods.index');
    }

    public function create()
    {
        return view('administrador.periods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:periods',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'registration_start_date' => 'required|date',
            'registration_end_date' => 'required|date',
        ], [
            'nombre.required' => 'El campo nombre es requerido',
            'fecha_inicio.required' => 'El campo fecha de inicio es requerido',
            'fecha_fin.required' => 'El campo fecha de fin es requerido',
            'registration_start_date.required' => 'El campo inicio de inscripciones es requerido',
            'registration_end_date.required' => 'El campo fin de inscripciones es requerido',
        ]);

        //dd($request->all());

        $period = Period::create($request->except('activo'));
        $notificacion = "El periodo {$period->nombre} se ha añadido correctamente";

        return redirect()->route('administrador.periods.index')->with('notificacion', $notificacion);
    }

    public function show(Period $period)
    {
        return view('administrador.periods.show', compact('period'));
    }

    public function edit(Period $period)
    {
        return view('administrador.periods.edit', compact('period'));
    }

    public function update(Request $request, Period $period)
    {
        $request->validate([
            'nombre' => 'required|unique:periods,nombre,' . $period->id,
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'registration_start_date' => 'required|date',
            'registration_end_date' => 'required|date',
        ], [
            'nombre.required' => 'El campo nombre es requerido',
            'fecha_inicio.required' => 'El campo fecha de inicio es requerido',
            'fecha_fin.required' => 'El campo fecha de fin es requerido',
            'registration_start_date.required' => 'El campo inicio de inscripciones es requerido',
            'registration_end_date.required' => 'El campo fin de inscripciones es requerido',
        ]);

        $period->update($request->all());
        $notificacion = "El periodo {$period->nombre} se ha actualizado correctamente";

        return redirect()->route('administrador.periods.index')->with('notificacion', $notificacion);
    }

    public function destroy(Period $period)
    {
        $period->delete();
        $notificacion = "El periodo {$period->nombre} se ha eliminado correctamente";

        return redirect()->route('administrador.periods.index')->with('notificacion', $notificacion);
    }
}
