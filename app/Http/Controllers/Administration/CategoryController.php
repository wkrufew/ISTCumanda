<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('administrador.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('administrador.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ], [
            'name.required' => 'El campo nombre es requerido',
            'name.unique' => 'La categoría ingresada ya existe',
        ]);

        $category = Category::create($request->all());
        $notificacion = "La categoría {$category->name} se ha añadido correctamente";

        return redirect()->route('administrador.categories.index')->with('notificacion', $notificacion);
    }

    public function show(Category $category)
    {
        return view('administrador.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('administrador.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
        ], [
            'name.required' => 'El campo nombre es requerido',
        ]);

        $category->update($request->all());
        $notificacion = "La categoría {$category->name} se ha actualizado correctamente";

        return redirect()->route('administrador.categories.index')->with('notificacion', $notificacion);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        $notificacion = "La categoría {$category->name} se ha eliminado correctamente";

        return redirect()->route('administrador.categories.index')->with('notificacion', $notificacion);
    }
}
