<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Periodo extends Model
{
    use HasFactory;

    protected $table = 'periodos';

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
        'is_active' => 'boolean'
    ];

    protected $fillable = ['name', 'code', 'is_active', 'is_current', 'start_date', 'end_date'];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'periodo_id');
    }

    // Establece este periodo como el actual y desactiva otros
    public function setAsCurrent()
    {
        DB::transaction(function () {
            // Desactivar todos los periodos actuales
            self::where('is_current', true)
                ->update(['is_current' => false]);

            // Establecer este como actual
            $this->is_current = true;
            $this->save();
        });
    }
}
