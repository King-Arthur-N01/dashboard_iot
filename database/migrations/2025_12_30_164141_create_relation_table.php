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
        Schema::table('schedule_data', function (Blueprint $table){
            $table->foreignId('garden_id')->identity('1,1')->references('id')->on('garden_data')->onDelete('cascade')->default(null)->nullable();
        });
        Schema::table('relay_data', function (Blueprint $table){
            $table->foreignId('schedule_id')->identity('1,1')->references('id')->on('schedule_data')->onDelete('cascade')->default(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
