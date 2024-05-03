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
        Schema::table('visa_options', function (Blueprint $table){
            $table->string('visa_department_fee')->nullable()->after('price');
            $table->string('administration_fee')->nullable()->after('visa_department_fee');
            $table->string('courier_fee')->nullable()->after('administration_fee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visa_options', function (Blueprint $table){
            $table->dropColumn('visa_department_fee');
            $table->dropColumn('administration_fee');
            $table->dropColumn('courier_fee');
        });
    }
};
