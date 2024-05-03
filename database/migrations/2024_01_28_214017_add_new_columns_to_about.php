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
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('banner_image')->after('content');
            $table->string('partner_title')->after('banner_image');
            $table->string('partner_subtitle')->after('partner_title');
            $table->text('meta_title')->after('partner_subtitle');
            $table->text('meta_description')->after('meta_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about', function (Blueprint $table) {
            //
        });
    }
};
