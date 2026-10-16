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
        Schema::create('soil_sensors', function (Blueprint $table) {
            $table->id();
            $table->decimal('soil_1', 5, 2)->nullable();
            $table->decimal('soil_2', 5, 2)->nullable();
            $table->decimal('soil_3', 5, 2)->nullable();
            $table->decimal('soil_4', 5, 2)->nullable();
            $table->decimal('soil_5', 5, 2)->nullable();
            $table->decimal('soil_6', 5, 2)->nullable();
            $table->decimal('soil_7', 5, 2)->nullable();
            $table->decimal('soil_8', 5, 2)->nullable();
            $table->decimal('soil_9', 5, 2)->nullable();
            $table->string('device_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soil_sensors');
    }
};
