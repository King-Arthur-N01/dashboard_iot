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
        Schema::create('garden_sensors', function (Blueprint $table) {
            $table->id();
            $table->decimal('garden_temp', 5, 2)->nullable();
            $table->decimal('garden_humi', 5, 2)->nullable();
            $table->decimal('garden_lumi', 5, 2)->nullable();
            $table->decimal('garden_soil', 5, 2)->nullable();
            $table->decimal('garden_rain', 5, 2)->nullable();
            $table->integer('device_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garden_sensors');
    }
};
