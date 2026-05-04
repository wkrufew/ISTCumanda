<?php

use App\Models\Course;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug')->unique();
            $table->longText('description');
            $table->string('url')->nullable();
            $table->string('url2')->nullable(); //nuevo

            //fecha de aprobacion
            $table->date('approval_date')->nullable(); //nuevo

            $table->text('comunicado')->nullable(); //nuevo

            //duracion en años
            $table->string('duration')->nullable(); //nuevo

            //modalidad
            $table->enum('modality', ['Presencial', 'Virtual', 'Hibrida'])->default('Hibrida'); //nuevo

            //total de la carrera
            $table->decimal('total_investment', 8, 2)->nullable(); //nuevo
            //inversion por ciclo
            $table->decimal('investment_per_cycle', 8, 2)->nullable(); //nuevo

            $table->enum('status', [Course::BORRADOR, Course::PUBLICADO])->default(Course::PUBLICADO);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('period_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
