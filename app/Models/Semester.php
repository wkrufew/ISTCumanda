<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'order', 'is_active'];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function programSubjects()
    {
        return $this->hasMany(ProgramSubject::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'program_subject')
            ->withPivot('program_id', 'is_active')
            ->withTimestamps();
    }
}
