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
        Schema::create('periodos', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ej: 2025-I, 2025-II
            $table->string('code')->unique(); // Ej: 2025-I, 2025-II
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_current')->default(false)->comment('Indica si es el periodo actual');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodos');
    }
};
