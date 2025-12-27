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
        Schema::create('relay_data', function (Blueprint $table) {
            $table->id();
            $table->json('temp_condition');
            $table->json('humi_condition');
            $table->json('lumi_condition');
            $table->json('soil_condition');
            $table->json('rain_condition');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relay_data');
    }
};
