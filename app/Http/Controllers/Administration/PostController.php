<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('administrador.posts.index');
    }

    public function create()
    {
        $tipos = Tipo::pluck('name', 'id');
        return view('administrador.posts.create', compact('tipos'));
    }

    public function store(Request $request)
    {

        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'description' => 'required',
            'url' => 'nullable|url',
            'is_active' => 'required',
            'is_relevant' => 'required',
            'tipo_id' => 'required',
            'file' => 'required|image|mimes:jpeg,png,webp|max:2048',
        ], [
            'title.required' => 'El campo Título es requerido',
            'slug.required' => 'El campo nombre es requerido',
            'slug.unique' => 'El slug ya existe, por favor intenta con otro título',
            'description.required' => 'El campo descripción es requerido',
            'tipo_id.required' => 'Debe seleccionar una categoría',
            'is_active.required' => 'Debe seleccionar una opcion',
            'is_relevant.required' => 'Debe seleccionar una opcion',
            'url.url' => 'Debe ingresar una URL válida',
            'file.required' => 'La imagen es requerida',
            'file.image' => 'El archivo que intentaste subir no es una imagen',
            'file.mimes' => 'La imagen debe ser de tipo JPEG, PNG o WEBP',
        ]);

        $post = new Post($request->all());
        $post->user_id = Auth::id();

        $post->save();

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));
            $post->image()->create(['url' => $url]);
        }
        $notificacion = "El post {$request->title} se ha creado correctamente";
        return redirect()->route('administrador.posts.index')->with('notificacion', $notificacion);
    }

    public function edit(Post $post)
    {
        $tipos = Tipo::pluck('name', 'id');
        return view('administrador.posts.edit', compact('post', 'tipos'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'description' => 'required',
            'tipo_id' => 'required',
            'is_active' => 'required',
            'is_relevant' => 'required',
            'url' => 'nullable|url',
            'file' => 'nullable|image|mimes:jpeg,png,webp|max:2048',
        ], [
            'title.required' => 'El campo Título es requerido',
            'slug.required' => 'El campo slug es requerido',
            'slug.unique' => 'El slug ya existe, por favor intenta con otro título',
            'description.required' => 'El campo descripción es requerido',
            'tipo_id.required' => 'Debe seleccionar una categoría',
            'is_active.required' => 'Debe seleccionar una opcion',
            'is_relevant.required' => 'Debe iseleccionar una opcion',
            'url.url' => 'Debe ingresar una URL válida',
            'file.image' => 'El archivo que intentaste subir no es una imagen',
            'file.mimes' => 'La imagen debe ser de tipo JPEG, PNG o WEBP',
        ]);

        $post->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            if ($post->image) {
                Storage::delete($post->image->url);
                $post->image->update(['url' => $url]);
            } else {
                $post->image()->create(['url' => $url]);
            }
        }

        $notificacion = "El post {$request->title} se ha actualizado correctamente";
        return redirect()->route('administrador.posts.edit', $post)->with('notificacion', $notificacion);
    }

    /* public function status(Post $post)
    {
        $course->status = Course::PUBLICADO;  // Puedes reemplazar `2` con una constante en el modelo Course.
        $course->save();

        return back();
    } */
}
