<?php

use App\Http\Controllers\Administration\CarreraNController;
use App\Http\Controllers\Administration\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\DashboardController;
use App\Http\Controllers\Administration\RoleController;
use App\Http\Controllers\Administration\StudentsController;
use App\Http\Controllers\Administration\UserController;
use App\Http\Controllers\Administration\CertificatesController;
use App\Http\Controllers\Administration\CourseController;
use App\Http\Controllers\Administration\DocumentController;
use App\Http\Controllers\Administration\EstudianteNController;
use App\Http\Controllers\Administration\InscritosController;
use App\Http\Controllers\Administration\MateriaNController;
use App\Http\Controllers\Administration\PeriodController;
use App\Http\Controllers\Administration\PeriodoNController;
use App\Http\Controllers\Administration\PostController;
use App\Http\Controllers\Administration\SemestreNController;
use App\Http\Controllers\Administration\TipoController;
use App\Livewire\Administration\ProgramAssignments\AssignmentsCreate;
use App\Livewire\Administration\ProgramAssignments\AssignmentsEdit;
use App\Livewire\Administration\ProgramAssignments\AssignmentsList;
use App\Livewire\Administration\Settings;
use App\Livewire\Administration\StudentCertificates;

Route::redirect('', '/administrador/dashboard');

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('can:Ver Dashboard')->name('administrador.dashboard');

Route::resource('roles', RoleController::class)->names('administrador.roles')->except('show');

Route::resource('users', UserController::class)->names('administrador.users')->only('index', 'edit', 'update');
Route::get('user/profile', [UserController::class, 'profile'])->name('administrador.user.profile');

Route::resource('students', StudentsController::class)->names('administrador.students')->only('index', 'create', 'store', 'edit', 'update');
//importacion de estudiantes
Route::get('students/import', [StudentsController::class, 'import'])->name('administrador.students.import');
Route::post('students/import/enrollet', [StudentsController::class, 'enrollet'])->name('administrador.students.enrollet');

Route::resource('certificates', CertificatesController::class)->names('administrador.certificates')->only('index', 'create', 'store', 'edit', 'update');

Route::get('student/{student}/certificates', StudentCertificates::class)->name('administrador.student.certificates');

Route::get('settings', Settings::class)/* ->middleware('can:Ver Configuraciones') */->name('administrador.settings');

//categorias
Route::resource('categories', CategoryController::class)->names('administrador.categories');

//periodos
Route::resource('periods', PeriodController::class)->names('administrador.periods');

//inscritos
Route::resource('inscritos', InscritosController::class)->names('administrador.inscritos');

//cursos
Route::resource('courses', CourseController::class)->names('administrador.courses');

Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('administrador.courses.goals');
Route::get('courses/{course}/requirements', [CourseController::class, 'requirements'])->name('administrador.courses.requirements');
Route::get('courses/{course}/audiences', [CourseController::class, 'audiences'])->name('administrador.courses.audiences');
Route::get('courses/{course}/teachers', [CourseController::class, 'teachers'])->name('administrador.courses.teachers');
Route::get('courses/{course}/advantages', [CourseController::class, 'advantages'])->name('administrador.courses.advantages');

Route::post('courses/{course}/status', [CourseController::class, 'status'])->name('administrador.courses.status');

//tipos post
Route::resource('tipos', TipoController::class)->names('administrador.tipos');

//cursos
Route::resource('posts', PostController::class)->names('administrador.posts');

//************** MODULO DE CALIFICACIONES Y ACTAS *****************

//******************* ESTUDIANTES ********************
Route::resource('estudiantes', EstudianteNController::class)->names('administrador.estudiantes');

//******************* PERIODOS *******************
Route::resource('periodos', PeriodoNController::class)->names('administrador.periodos');

//******************* CARRERAS *******************
Route::resource('carreras', CarreraNController::class)->names('administrador.carreras');
//AGREGAR MATERIAS A CARRERAS
Route::get('carreras/{carrera}/asignaciones', AssignmentsList::class)->name('administrador.carreras.assignments');
//ASIGNAR MATERIAS A CARRERAS
Route::get('/carreras/{carrera}/asignaciones/crear', AssignmentsCreate::class)->name('administrador.assignments.crear');
Route::get('/carreras/{carrera}/asignaciones/{asignacion}/editar', AssignmentsEdit::class)->name('administrador.assignments.editar');

//******************* SEMESTRES *******************
Route::resource('semestres', SemestreNController::class)->names('administrador.semestres');

//MATERIAS
Route::resource('materias', MateriaNController::class)->names('administrador.materias');

//DOCUMENTOS
Route::resource('documents', DocumentController::class)
    ->names('administrador.documents')
    ->except('show');
