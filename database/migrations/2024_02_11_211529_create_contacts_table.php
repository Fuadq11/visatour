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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('banner_image');
            $table->string('main_email');
            $table->string('email')->nullable();
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('phone3')->nullable();
            $table->string('phone4')->nullable();
            $table->text('address');
            $table->text('about');
            $table->text('map');
            $table->text('work_hours');
            $table->text('meta_title');
            $table->text('meta_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
