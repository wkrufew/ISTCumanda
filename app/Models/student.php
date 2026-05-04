<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'document_type',
        'document',
        'status',
        'is_active',
        'codigo',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function certificates()
    {
        return $this->belongsToMany(Certificate::class, 'certificate_student')
                    ->withPivot('assigned_at', 'start_date', 'end_date', 'file_path')
                    ->using(CertificateStudent::class)
                    ->withTimestamps();
    }

    public function getAssignedAtFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->pivot->assigned_at)->isoFormat('D [de] MMMM');
    }

}
