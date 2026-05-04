<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('cascade');
            $table->foreignId('program_id')->constrained('programs')->onDelete('cascade');
            $table->foreignId('periodo_id')->constrained('periodos')->onDelete('cascade'); // Corregido a periodo_id
            $table->foreignId('semester_id')->constrained()->onDelete('cascade');
            $table->date('enrollment_date')->default(now());
            $table->enum('status', ['Activo', 'Inactivo', 'Congelado'])->default('Activo');
            $table->timestamps();

            //$table->unique(['estudiante_id', 'program_id', 'periodo_id', 'semester_id']);
            $table->unique(
                ['estudiante_id', 'program_id', 'periodo_id', 'semester_id'],
                'enrollments_unique_index'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
