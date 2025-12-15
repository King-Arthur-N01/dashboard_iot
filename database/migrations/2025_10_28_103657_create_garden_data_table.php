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
        Schema::create('garden_data', function (Blueprint $table) {
            $table->id();
            $table->string('garden_name');
            $table->text('garden_description')->nullable();
            $table->string('garden_picture')->nullable();
            $table->string('sensor_data_link')->nullable();
            $table->string('relay_data_link')->nullable();
            $table->string('schedule_name_1')->nullable();
            $table->time('schedule_time_1')->nullable();
            $table->string('schedule_name_2')->nullable();
            $table->time('schedule_time_2')->nullable();
            $table->string('schedule_name_3')->nullable();
            $table->time('schedule_time_3')->nullable();
            $table->string('schedule_name_4')->nullable();
            $table->time('schedule_time_4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garden_data');
    }
};
