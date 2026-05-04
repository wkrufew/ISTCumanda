<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $tecnologys = Course::where('status', 2)
        ->take(3)
        ->get();     

        return view('welcome', compact('tecnologys'));
    }
}
