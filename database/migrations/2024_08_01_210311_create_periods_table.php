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
        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del periodo, ejemplo "2024-2025"
            $table->date('fecha_inicio'); // Fecha de inicio del periodo
            $table->date('fecha_fin'); // Fecha de fin del periodo
            $table->date('registration_start_date'); // Fecha de inicio de inscripciones
            $table->date('registration_end_date'); // Fecha de fin de inscripciones
            $table->boolean('activo')->default(true); // Estado del periodo
            $table->enum('tipo', ['curso', 'certificado'])->default('curso'); // Estado del periodo
            $table->timestamps();
        });

        /* Schema::table('courses', function (Blueprint $table) {
            $table->foreignId('period_id')->nullable()->constrained('periods')->onDelete('set null');
        }); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /* Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['period_id']);
            $table->dropColumn('period_id');
        }); */

        Schema::dropIfExists('periods');
    }
};
