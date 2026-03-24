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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId("driver_id")->constrained()->onDelete("cascade");
            $table->foreignId("vehicle_id")->constrained()->onDelete("cascade");
            $table->string("start_point");
            $table->string("end_point");
            $table->decimal("distance",8,2);
            $table->decimal("fuel_consumed",8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
