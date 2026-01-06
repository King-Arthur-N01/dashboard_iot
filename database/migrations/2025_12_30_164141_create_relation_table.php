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
        Schema::table('garden_data', function (Blueprint $table){
            $table->foreignId('schedule_id_1')->identity('1,1')->references('id')->on('relay_data')->onDelete('cascade')->nullable();
            $table->foreignId('schedule_id_2')->identity('1,1')->references('id')->on('relay_data')->onDelete('cascade')->nullable();
            $table->foreignId('schedule_id_3')->identity('1,1')->references('id')->on('relay_data')->onDelete('cascade')->nullable();
            $table->foreignId('schedule_id_4')->identity('1,1')->references('id')->on('relay_data')->onDelete('cascade')->nullable();
        });
        Schema::table('schedule_data', function (Blueprint $table){
            $table->foreignId('condition_id')->identity('1,1')->references('id')->on('relay_data')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
