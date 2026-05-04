<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'modalidad',
        'description',
        'date_start',
        'date_end',
        'hours',
        'student_id',
        'code',
        'isActive'
    ];

    protected $casts = [
        'date_start' => 'datetime:Y-m-d',
        'date_end' => 'datetime:Y-m-d',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'certificate_student')
                    ->withPivot('assigned_at', 'start_date', 'end_date', 'file_path')
                    ->using(CertificateStudent::class)
                    ->withTimestamps();
    }

    public function getAssignedAtFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->pivot->assigned_at)->isoFormat('D [de] MMMM [de] YYYY');
    }

    //para agregar un nuevo campo en la tabla pivot de la relacion muchos a muchos el campo file_path
    public function getFilePathAttribute()
    {
        return $this->pivot->file_path;
    }
    //deberia llamarse asi $certificate->file_path_attribute 
    //para obtener el valor del campo file_path de la tabla pivot 
}
