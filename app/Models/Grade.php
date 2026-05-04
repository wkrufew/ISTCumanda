<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_id',
        'subject_id',
        'attendance',
        'grade1',
        'grade2',
        'grade3',
        'grade4',
        'grade5',
        'status'
    ];

    protected $casts = [
        'attendance' => 'decimal:2',
        'grade1' => 'decimal:2',
        'grade2' => 'decimal:2',
        'grade3' => 'decimal:2',
        'grade4' => 'decimal:2',
        'grade5' => 'decimal:2'
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // Método para calcular el promedio final
    /* public function calculateFinalGrade()
    {
        $count = 0;
        $sum = 0;

        foreach (['grade1', 'grade2', 'grade3', 'grade4'] as $grade) {
            if (!is_null($this->$grade)) {
                $sum += $this->$grade;
                $count++;
            }
        }

        if ($count > 0) {
            $this->grade5 = $sum / $count;

            // Actualizar el estado según la nota final
            $this->status = $this->grade5 >= 7 ? 'Aprobado' : 'Reprobado';

            $this->save();
        }

        return $this->grade5;
    } */
}
