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
        Schema::create('relay_status', function (Blueprint $table) {
            $table->id();
            $table->boolean('relay_1_status');
            $table->boolean('relay_2_status');
<<<<<<< HEAD
            $table->boolean('relay_3_status');
            $table->boolean('relay_4_status');
=======
>>>>>>> eaa41139bbb2714e5abf9b51a494913ec0c965bd
            $table->integer('relay_id');
            $table->time('duration');
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relay_status');
    }
};
