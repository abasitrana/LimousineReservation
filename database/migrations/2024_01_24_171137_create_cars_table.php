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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_name');
            $table->string('car_registration_number');
            $table->longText('car_description');
            $table->unsignedBigInteger('car_category_id')->index();
            $table->foreign('car_category_id')->references('id')->on('cars_categories');
            $table->decimal('car_base_fare')->nullable();
            $table->integer('max_capacity');
            $table->integer('max_luggage');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
