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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('site_address2')->nullable()->after('site_address'); //nuevo
            $table->string('site_address3')->nullable()->after('site_address2'); //nuevo
            $table->string('site_address4')->nullable()->after('site_address3'); //nuevo
            $table->string('site_tiktok')->nullable()->after('site_instagram'); //nuevo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'site_address2',
                'site_address3',
                'site_address4',
                'site_tiktok'
            ]);
        });
    }
};
