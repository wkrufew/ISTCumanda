<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Routing\Controller;
use Database\Seeders\PermissionSeeder;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('can:Generar Roles y Permisos')->only('index', 'create', 'store', 'edit', 'update', 'destroy'); */
        $this->middleware('can:Generar Roles y Permisos')->except('index');
    }

    public function index()
    {

        $roles = Role::whereNotIn('name', ['Super Admin'])->paginate(10);
        return view('administrador.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('administrador.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'required'
        ]);


        $role = Role::create([
            'name' => $request->name
        ]);

        $role->permissions()->attach($request->permissions);

        $menssage = "El rol $request->name se ha añadido correctamente";

        return redirect()->route('administrador.roles.index')->with(compact('menssage'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('administrador.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'required'
        ]);

        $role->update([
            'name' => $request->name
        ]);

        $role->permissions()->sync($request->permissions);

        return redirect()->route('administrador.roles.index')->with('menssage', 'El rol se ha actualizado con correctamente');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('administrador.roles.index')->with('menssage', 'El rol se ha eliminado correctamente');
    }
}
