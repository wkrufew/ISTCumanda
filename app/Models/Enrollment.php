<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id',
        'program_id',
        'periodo_id',
        'semester_id',
        'enrollment_date',
        'status'
    ];

    protected $casts = [
        'enrollment_date' => 'date'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    // Método para matricular un estudiante en todas las materias del semestre
    public function enrollInAllSubjects()
    {
        // Obtener todas las materias del programa y semestre
        $subjects = ProgramSubject::where('program_id', $this->program_id)
            ->where('semester_id', $this->semester_id)
            ->where('is_active', true)
            ->get()
            ->pluck('subject_id');

        // Crear registros de calificaciones para cada materia
        foreach ($subjects as $subjectId) {
            Grade::create([
                'enrollment_id' => $this->id,
                'subject_id' => $subjectId,
                'attendance' => 0,
                'status' => 'Pendiente'
            ]);
        }
    }
}
