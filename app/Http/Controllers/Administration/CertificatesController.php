<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificatesController extends Controller
{
    public function index()
    {
        return view('administrador.certificates.index');
    }

    public function create()
    {
        return view('administrador.certificates.create', ['certificate' => new Certificate ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'modalidad' => 'required',
            'date_start' => 'required',
            'date_end' => 'required|date|after_or_equal:date_start',
            'hours' => 'required|integer',
            'description' => 'required',
            'isActive' => 'required|boolean',
            'code' => 'required|unique:certificates,code', // Validación única para code
        ]);

        Certificate::create($request->all());

        return redirect()->route('administrador.certificates.index')->with('menssage', 'Certificado creado con éxito');
    }

    public function edit(Certificate $certificate)
    {
        //dd($certificate);
        return view('administrador.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'title' => 'required',
            'modalidad' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'date_end' => 'required|date|after_or_equal:date_start',
            'hours' => 'required|integer',
            'description' => 'required',
            'isActive' => 'required|boolean',
            'code' => 'required|unique:certificates,code,' . $certificate->id, // Asegura que el code sea único, excepto para este certificado
        ]);
        //genera el certificado actualizado
        $certificate->update( $request->all() );

        return redirect()->route('administrador.certificates.index')->with('menssage', 'Certificado actualizado con éxito');
    }
}
