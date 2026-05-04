<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(Course $course): View
    {
        return view('course.show', compact('course'));
    }

    public function inscripcion(Course $course): View
    {
        // Verificar si el curso tiene un periodo asociado y si está activo
    if (!$course->period || !$course->period->isRegistrationOpen()) {
        abort(403, 'No se permite la inscripción a este curso, el periodo no está activo');
    }

        return view('course.inscripcion', compact('course'));
    }
}
