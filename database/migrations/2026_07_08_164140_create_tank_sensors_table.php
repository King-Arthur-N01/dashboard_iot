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
        Schema::create('tank_sensors', function (Blueprint $table) {
            $table->id();
            $table->decimal('tank_temp', 5, 2)->nullable();
            $table->decimal('tank_humi', 5, 2)->nullable();
            $table->decimal('tank_vol', 5, 2)->nullable();
            $table->integer('tank_stat')->nullable();
            $table->integer('device_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tank_sensors');
    }
};
