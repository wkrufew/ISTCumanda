<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'description', 'credits', 'is_active'];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'program_subject')
            ->withPivot('semester_id', 'is_active')
            ->withTimestamps();
    }

    public function semesters()
    {
        return $this->belongsToMany(Semester::class, 'program_subject')
            ->withPivot('program_id', 'is_active')
            ->withTimestamps();
    }
}
