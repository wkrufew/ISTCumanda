<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'description', 'is_active'];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'program_subject')
            ->withPivot('semester_id', 'is_active')
            ->withTimestamps();
    }

    public function semesterSubjects($semesterId)
    {
        return $this->subjects()
            ->wherePivot('semester_id', $semesterId)
            ->wherePivot('is_active', true);
    }
}
