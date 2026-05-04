<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InscritosController extends Controller
{
    public function index()
    {
        return view('administrador.inscritos.index');
    }
}
