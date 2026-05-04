<?php

namespace App\Http\Controllers\Administration;

use App\Models\Certificate;
use App\Models\Student;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Ver Dashboard')->only('index');   
    }

    public function index()
    {
        $superAdminRoleId = Role::where('name', 'Super Admin')->first()->id;

        $data = [
            'usuarios' => User::whereDoesntHave('roles', function ($query) use ($superAdminRoleId) { $query->where('id', $superAdminRoleId); })->count(),
            'roles' => Role::whereNotIn('name', ['Super Admin'])->count(),
            'studiantes' => Student::count(),
            'certificados' => Certificate::count(),
            'asignaciones' => DB::table('certificate_student')->count(),
        ];  

        return view('administrador.dashboard' , compact('data'));
    }
}
