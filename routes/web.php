<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\WelcomeController;
use App\Livewire\FormularioContacto;
use App\Livewire\PostNews;
use App\Models\Course;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('home');

/* SITEMAPA */
Route::get('/sitemap.xml', [SitemapController::class, 'index']);

/* CURSOS Y FILTROS */
Route::get('cursos/', [CoursesController::class, 'show'])->name('course.index');
/* CURSOS */
Route::get('cursos/{course}', [CourseController::class, 'show'])->name('course.show');

/* FORMULARIO INSCRIPCION */
Route::get('cursos/{course}/inscripcion', [CourseController::class, 'inscripcion'])->name('course.inscripcion');

Route::get('certificaciones', function () {
    return view('certificados');
})->name('certificados');

Route::get('convenios', function () {
    return view('convenio');
})->name('convenios');

Route::get('nosotros', function () {
    return view('nosotros');
})->name('about');

Route::get('documents', function () {
    return view('documents');
})->name('documents');

Route::get('contacto', FormularioContacto::class)->name('contact');

//NEWS
Route::get('news', PostNews::class)->name('news.index');
Route::get('news/{post}', [PostController::class, 'show'])->name('news.show');

Route::get('virtual', function () {
    return view('virtual');
})->name('virtual');

Route::get('calificaciones', function () {
    return view('calificaciones');
})->name('calificaciones');


Route::get('key-generate', function () {
    $exitCode = Artisan::call('key:generate');
    return 'Key generada';
});

Route::get('storage-link', function () {
    $exitCode = Artisan::call('storage:link');
    return 'Simbolic Link establecido';
});

Route::get('/optimize-clear', function () {
    $exitCode = Artisan::call('optimize:clear');
    return 'Depurada cache';
});
