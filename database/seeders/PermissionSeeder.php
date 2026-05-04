<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'Generar Roles y Permisos'
        ]);

        Permission::create([
            'name' => 'Asignacion Roles'
        ]);

        Permission::create([
            'name' => 'Ver Dashboard'
        ]);

        Permission::create([
            'name' => 'Crear Estudiantes'
        ]);

        Permission::create([
            'name' => 'Leer Estudiantes'
        ]);

        Permission::create([
            'name' => 'Actualizar Estudiantes'
        ]);

        Permission::create([
            'name' => 'Eliminar Estudiantes'
        ]);
        
        Permission::create([
            'name' => 'Crear Certificado'
        ]);

        Permission::create([
            'name' => 'Leer Certificado'
        ]);

        Permission::create([
            'name' => 'Actualizar Certificado'
        ]);

        Permission::create([
            'name' => 'Eliminar Certificado'
        ]);
    }
}
