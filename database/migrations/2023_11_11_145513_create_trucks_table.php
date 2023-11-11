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
        Schema::create('trucks', function (Blueprint $table) {
            $table->id('TruckID');
            $table->string('Image');
            $table->string('Model');
            $table->integer('Year');
            $table->decimal('Price', 10, 2);
            $table->integer('PassengerCount');
            $table->string('Manufacturer');
            $table->integer('WheelCount')->nullable();
            $table->integer('CargoAreaSize')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trucks');
    }
};
