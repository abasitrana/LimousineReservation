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
        Schema::create('cars_pictures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id')->index();
            $table->foreign('car_id')->references('id')->on('cars');
            $table->string('car_picture_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars_pictures');
    }
};
