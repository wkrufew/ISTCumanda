<?php

namespace App\Imports;

use App\Models\Certificate;
use App\Models\CertificateStudent;
use App\Models\File;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsCertificatesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        try {
            return DB::transaction(function () use ($row) {
                // Crear o encontrar estudiante
                $student = Student::firstOrCreate(
                    ['document' => $row['cedula']],
                    [
                        'name' => $row['nombres_y_apellidos'] ?? '',
                        'email' => $row['email'] ?? null,
                        'phone' => $row['phone'] ?? null,
                        'address' => $row['direction'] ?? null,
                        'codigo' => $row['codigo'] ?? null,
                        'user_id' => Auth::id(),
                    ]
                );

                // Verificar certificado
                $certificateId = $row['id_certificado'];
                $certificate = Certificate::findOrFail($certificateId);

                if (!$certificate) {
                    throw new \Exception("No se encontró el certificado con ID: {$certificateId}");
                }

                // Preparar las fechas
                $startDate = !empty($row['fecha_de_inicio'])
                    ? Carbon::parse($row['fecha_de_inicio'])
                    : now();

                $endDate = !empty($row['fecha_de_fin'])
                    ? Carbon::parse($row['fecha_de_fin'])
                    : $startDate->copy()->addYear();

                // Crear la relación directamente usando el método attach
                $student->certificates()->syncWithoutDetaching([
                    $certificateId => [
                        'assigned_at' => now(),
                        'start_date' => $startDate,
                        'end_date' => $endDate,
                        'file_path' => $row['url'],
                    ]
                ]);

                // Obtener el registro recién creado
                $certificateStudent = DB::table('certificate_student')
                    ->where('certificate_id', $certificateId)
                    ->where('student_id', $student->id)
                    ->first();

                if (!$certificateStudent) {
                    throw new \Exception("No se pudo crear la relación certificado-estudiante");
                }

                return $student;
            });
        } catch (\Exception $e) {
            Log::error('Error en la importación:', [
                'message' => $e->getMessage(),
                'row' => $row,
                'trace' => $e->getTraceAsString()
            ]);

            throw new \Exception('Error en la importación: ' . $e->getMessage());
        }
    }
}
