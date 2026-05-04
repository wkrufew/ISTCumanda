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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollment_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');

            $table->decimal('attendance', 5, 2)->default(0);
            $table->decimal('grade1', 5, 2)->nullable();
            $table->decimal('grade2', 5, 2)->nullable();
            $table->decimal('grade3', 5, 2)->nullable();
            $table->decimal('grade4', 5, 2)->nullable();
            $table->decimal('grade5', 5, 2)->nullable()->comment('Para otra nata en caso de que deba contemplarse');
            $table->enum('status', ['Aprobado', 'Reprobado', 'Pendiente'])->default('Pendiente');
            $table->timestamps();

            $table->unique(['enrollment_id', 'subject_id']); // no duplicar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
