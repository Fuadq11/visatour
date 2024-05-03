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
        Schema::create('visa_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->foreignId('visa_id')->constrained()->cascadeOnDelete();
            $table->foreignId('visa_type_id')->constrained()->cascadeOnDelete();
            $table->text('name');
            $table->string('price')->nullable();
            $table->string('visa_department_fee')->nullable()->after('price');
            $table->string('Administration_fee')->nullable()->after('visa_department_fee');
            $table->string('courier_fee')->nullable()->after('Administration_fee');
            $table->text('visa_period')->nullable();
            $table->text('stay_duration')->nullable();
            $table->text('additional_note')->nullable();
            $table->text('general_info')->nullable();
            $table->integer('order_no')->default(1);
            $table->timestamps();
        });
        Schema::update('visa_options', function (Blueprint $table) {
           
            $table->string('visa_department_fee')->nullable()->after('price');
            $table->string('Administration_fee')->nullable()->after('visa_department_fee');
            $table->string('courier_fee')->nullable()->after('Administration_fee');
           
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_options');
    }
};
