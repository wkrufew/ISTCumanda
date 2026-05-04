<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSubject extends Model
{
    use HasFactory;

    protected $table = 'program_subject';

    protected $fillable = [
        'program_id',
        'subject_id',
        'semester_id',
        'periodo_id',
        'is_active'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
