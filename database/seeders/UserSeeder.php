<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::firstOrCreate(['name' => 'Super Admin']);

        $user = User::create([
            'name' => 'Administrador',
            'email' => 'administrador@hotmail.com',
            'password' => bcrypt('9administrador3')
        ]);

        $user->assignRole($role);
    }
}
