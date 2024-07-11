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
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('location_id')
                ->constrained()
                ->restrictOnDelete();
            $table->float('temp');
            $table->string('description');
            $table->float('wind_speed');
            $table->float('pressure');
            $table->float('humidity');

            $yable->bigInteger('timestamp');

            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};
