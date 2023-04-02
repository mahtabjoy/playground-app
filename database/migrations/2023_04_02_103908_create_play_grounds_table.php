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
        Schema::create('play_grounds', function (Blueprint $table) {
            $table->id();
            $table->string('ground_location', 50);
            $table->string('ground_description', 50);
            $table->string('ground_image', 100);
            $table->enum('ground_slot_time', array('10:00-1:00 PM', '3:00-6:00 PM', '8:00-10:00'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('play_grounds');
    }
};
