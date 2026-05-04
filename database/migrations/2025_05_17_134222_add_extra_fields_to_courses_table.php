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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('url2')->nullable()->after('url');
            $table->date('approval_date')->nullable()->after('url2');
            $table->text('comunicado')->nullable()->after('approval_date');
            $table->string('duration')->nullable()->after('comunicado');
            $table->enum('modality', ['Presencial', 'Virtual', 'Hibrida'])->default('Hibrida')->after('duration');
            $table->decimal('total_investment', 8, 2)->nullable()->after('modality');
            $table->decimal('investment_per_cycle', 8, 2)->nullable()->after('total_investment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn([
                'url2',
                'approval_date',
                'comunicado',
                'duration',
                'modality',
                'total_investment',
                'investment_per_cycle'
            ]);
        });
    }
};
