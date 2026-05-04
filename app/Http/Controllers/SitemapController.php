<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        // Obtenemos los cursos publicados
        $courses = Course::where('status', Course::PUBLICADO)->get();
        // Obtener todas las noticias publicadas
        $news = Post::where('is_active', true)->get();

        // Retornamos la vista del sitemap con los datos
        return Response::make(
            view('sitemap.index', compact('courses', 'news')),
            200,
            ['Content-Type' => 'application/xml']
        );
    }
}
