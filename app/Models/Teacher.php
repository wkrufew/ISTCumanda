<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getInitialsAttribute()
{
    // Lista de posibles títulos a ignorar
    $titles = ['Ing.', 'Dr.', 'Lic.', 'Sr.', 'Sra.', 'Prof.', 'PhD'];

    // Separar el nombre en partes
    $names = explode(' ', $this->name);

    // Filtrar posibles títulos
    $filteredNames = array_filter($names, function($name) use ($titles) {
        return !in_array($name, $titles);
    });

    // Reindexar el array
    $filteredNames = array_values($filteredNames);

    // Generar las iniciales basándonos en el nombre filtrado
    if (count($filteredNames) > 1) {
        // Si hay al menos dos palabras, tomamos la primera letra del primer nombre y apellido
        $initials = strtoupper($filteredNames[0][0] . $filteredNames[1][0]);
    } else {
        // Si hay solo un nombre, tomamos la primera letra
        $initials = strtoupper($filteredNames[0][0]);
    }

    return $initials;
}
}
