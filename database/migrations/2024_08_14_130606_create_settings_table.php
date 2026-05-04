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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('ISTCumandá');
            $table->string('site_title_portada')->nullable();
            $table->string('site_subtitle_portada')->nullable();
            $table->string('site_phone_1')->nullable();
            $table->string('site_phone_2')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_address')->nullable();
            $table->string('site_address2')->nullable(); //nuevo
            $table->string('site_address3')->nullable(); //nuevo
            $table->string('site_address4')->nullable(); //nuevo
            $table->string('site_maps')->nullable();
            $table->string('site_facebook')->nullable();
            $table->string('site_instagram')->nullable();
            $table->string('site_tiktok')->nullable(); //nuevo
            $table->string('footer_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
