<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_number',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'document_type',
        'status',
        'is_active'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function fullName()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    // Métodos de ayuda
    public function getCurrentEnrollment()
    {
        $currentPeriodo = Periodo::where('is_current', true)->first();

        if (!$currentPeriodo) {
            return null;
        }

        return $this->enrollments()
            ->where('periodo_id', $currentPeriodo->id)
            ->first();
    }

    public function getCurrentGrades()
    {
        $enrollment = $this->getCurrentEnrollment();

        if (!$enrollment) {
            return collect();
        }

        return $enrollment->grades;
    }
}
