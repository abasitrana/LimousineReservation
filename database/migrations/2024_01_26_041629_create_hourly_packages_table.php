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
        Schema::create('hourly_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->string('package_description');
            $table->string('default_hours')->nullable();
            $table->unsignedBigInteger('car_id')->index();
            $table->foreign('car_id')->references('id')->on('cars');
            $table->decimal('hourly_rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hourly_packages');
    }
};
