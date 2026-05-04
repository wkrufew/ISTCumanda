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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');  // Nombre del estudiante
            $table->string('apellido');  // Apellido del estudiante
            $table->string('cedula');  // Documento de identidad del estudiante
            $table->string('telefono');  // Teléfono del estudiante
            $table->string('correo');  // Correo del estudiante

            $table->unsignedBigInteger('course_id')->nullable();  // Permitir que sea null si se elimina el curso
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');

            $table->unsignedBigInteger('period_id')->nullable();  // Permitir que sea null si se elimina el periodo
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('set null');  // Asociamos la inscripción con el periodo

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
