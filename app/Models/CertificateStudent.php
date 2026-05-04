<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CertificateStudent extends Pivot
{
    protected $table = 'certificate_student';
    
    public $incrementing = true;
    protected $guarded = [];  // Permitir asignación masiva de todos los campos
    
    protected $casts = [
        'assigned_at' => 'datetime',
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];
    
    protected $dates = [
        'assigned_at',
        'start_date',
        'end_date',
        'file_path',
        'created_at',
        'updated_at'
    ];

    // Relación con el modelo Certificate
    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }

    // Relación con el modelo Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
