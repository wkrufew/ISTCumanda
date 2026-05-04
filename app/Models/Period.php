<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'fecha_inicio' => 'datetime:Y-m-d',
        'fecha_fin' => 'datetime:Y-m-d',
        'registration_start_date' => 'datetime:Y-m-d',
        'registration_end_date' => 'datetime:Y-m-d',
    ];

    public function isRegistrationOpen()
    {
        $today = now();
    
        // Verifica que ambas fechas no sean null
        if (!$this->activo || is_null($this->registration_start_date) || is_null($this->registration_end_date)) {
            return false;
        }

        // Compara sin tener en cuenta la hora
        return $today->between($this->registration_start_date->startOfDay(), $this->registration_end_date->endOfDay());
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function inscripcions()
    {
        return $this->hasMany(Inscription::class);
    }
    
    //$periodo = Period::find($periodo_id);
    //$inscripciones = $periodo->inscripcions; // Obtiene todas las inscripciones del periodo
}
