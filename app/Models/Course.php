<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'/* ,'status' */];

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $casts = [
        'approval_date' => 'datetime:Y-m-d',
    ];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function advantages()
    {
        return $this->hasMany(Advantages::class);
    }

    public function audiences()
    {
        return $this->hasMany(Audience::class);
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Section::class);
    }

    public function inscripcions()
    {
        return $this->hasMany(Inscription::class);
    }
}
