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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');  // Corregido de fisrt_name
            $table->string('last_name');
            $table->enum('document_type', ['Cedula', 'Pasaporte', 'Cedula Extranjera']);
            $table->string('id_number')->unique(); // cédula o pasaporte
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->enum('status', ['Cursando', 'Pendiente', 'Retirado', 'Terminado']);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
