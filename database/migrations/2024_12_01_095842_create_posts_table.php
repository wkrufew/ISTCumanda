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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug')->unique();
            $table->longText('description');
            $table->string('url')->nullable();//para un link externo

            $table->boolean('is_active')->default(false); // Publicado o borrador
            $table->boolean('is_relevant')->default(false); // Destacado

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('tipo_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
