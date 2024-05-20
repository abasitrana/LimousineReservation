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
        Schema::create('hourly_package_slabs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hourly_package_id')->constrained('hourly_packages');
            $table->foreignId('car_id')->constrained('cars');
            $table->string('hourly_slap', '50');
            $table->float('extra_hourly_price', '100');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hourly_package_slabs');
    }
};
