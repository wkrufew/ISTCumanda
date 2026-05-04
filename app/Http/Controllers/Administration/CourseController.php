<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as Log;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{

    public function index()
    {
        return view('administrador.courses.index');
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $periods = Period::pluck('nombre', 'id');
        return view('administrador.courses.create', compact('categories', 'periods'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'description' => 'required',
            'category_id' => 'required',
            'period_id' => 'required',
            'modality' => 'required',
            'duration' => 'required',
            'url' => 'nullable|url',
            'url2' => 'nullable|url',
            'approval_date' => 'nullable|date',
            'comunicado' => 'nullable|string',
            'total_investment' => 'nullable|numeric',
            'investment_per_cycle' => 'nullable|numeric',
            'file' => 'nullable|image|mimes:jpeg,png,webp|max:2048',
        ], [
            'title.required' => 'El campo Título es requerido',
            'slug.required' => 'El campo nombre es requerido',
            'slug.unique' => 'El slug ya existe, por favor intenta con otro título',
            'description.required' => 'El campo descripción es requerido',
            'category_id.required' => 'Debe seleccionar una categoría',
            'period_id.required' => 'Debe seleccionar un periodo',
            'modality.required' => 'Debe seleccionar una modalidad',
            'duration.required' => 'Debe seleccionar una duración',
            'url.url' => 'Debe ingresar una URL válida',
            'url2.url' => 'Debe ingresar una URL válida',
            'approval_date.date' => 'La fecha de aprobación debe ser una fecha válida',
            'comunicado.string' => 'El comunicado debe ser un texto',
            'total_investment.numeric' => 'La inversión total debe ser un número',
            'investment_per_cycle.numeric' => 'La inversión por ciclo debe ser un número',
            'file.image' => 'El archivo que intentaste subir no es una imagen',
            'file.mimes' => 'La imagen debe ser de tipo JPEG o PNG',
        ]);

        $course = new Course($request->all());
        $course->user_id = Auth::id();
        $course->status = Course::BORRADOR;
        $course->save();
        if ($request->file('file')) {
            $url = Storage::put('courses', $request->file('file'));
            $course->image()->create(['url' => $url]);
        }
        $notificacion = "El curso {$request->title} se ha creado correctamente";
        return redirect()->route('administrador.courses.index')->with('notificacion', $notificacion);
    }

    public function edit(Course $course)
    {
        $categories = Category::pluck('name', 'id');
        $periods = Period::pluck('nombre', 'id');
        return view('administrador.courses.edit', compact('course', 'categories', 'periods'));
    }

    public function update(Request $request, Course $course)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $course->id,
            'description' => 'required',
            'category_id' => 'required',
            'period_id' => 'required',
            'modality' => 'required',
            'duration' => 'nullable',
            'url' => 'nullable|url',
            'url2' => 'nullable|url',
            'approval_date' => 'nullable|date',
            'comunicado' => 'nullable|string',
            'total_investment' => 'nullable|numeric',
            'investment_per_cycle' => 'nullable|numeric',
            'file' => 'nullable|image|mimes:jpeg,png,webp|max:2048',
        ], [
            'title.required' => 'El campo Título es requerido',
            'slug.required' => 'El campo slug es requerido',
            'slug.unique' => 'El slug ya existe, por favor intenta con otro título',
            'description.required' => 'El campo descripción es requerido',
            'category_id.required' => 'Debe seleccionar una categoría',
            'period_id.required' => 'Debe seleccionar un periodo',
            'modality.required' => 'Debe seleccionar una modalidad',
            'duration.nullable' => 'Debe seleccionar una duración',
            'url.url' => 'Debe ingresar una URL válida',
            'url2.url' => 'Debe ingresar una URL válida',
            'approval_date.date' => 'La fecha de aprobación debe ser una fecha válida',
            'comunicado.string' => 'El comunicado debe ser un texto',
            'total_investment.numeric' => 'La inversión total debe ser un número',
            'investment_per_cycle.numeric' => 'La inversión por ciclo debe ser un número',
            'file.image' => 'El archivo que intentaste subir no es una imagen',
            'file.mimes' => 'La imagen debe ser de tipo JPEG o PNG',
        ]);

        $course->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('courses', $request->file('file'));

            if ($course->image) {
                Storage::delete($course->image->url);
                $course->image->update(['url' => $url]);
            } else {
                $course->image()->create(['url' => $url]);
            }
        }

        $notificacion = "El plan {$request->title} se ha actualizado correctamente";
        return redirect()->route('administrador.courses.index', $course)->with('notificacion', $notificacion);
    }


    public function goals(Course $course)
    {
        return view('administrador.courses.goals', compact('course'));
    }

    public function requirements(Course $course)
    {
        return view('administrador.courses.requiriments', compact('course'));
    }

    public function audiences(Course $course)
    {
        return view('administrador.courses.audiences', compact('course'));
    }

    public function teachers(Course $course)
    {
        return view('administrador.courses.teachers', compact('course'));
    }

    public function advantages(Course $course)
    {
        return view('administrador.courses.advantages', compact('course'));
    }

    public function status(Course $course)
    {
        $course->status = Course::PUBLICADO;  // Puedes reemplazar `2` con una constante en el modelo Course.
        $course->save();

        return back();
    }
}
