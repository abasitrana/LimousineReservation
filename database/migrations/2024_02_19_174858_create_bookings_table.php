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
        Schema::create('bookings', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->unsignedBigInteger('fare_id')->nullable();
            $table->foreign('fare_id')->references('id')->on('fares');
            $table->unsignedBigInteger('car_id')->index();
            $table->foreign('car_id')->references('id')->on('cars');
            $table->unsignedBigInteger('hourly_package_id')->nullable();
            $table->foreign('hourly_package_id')->references('id')->on('hourly_packages');
            $table->string('datepicker');
            $table->string('timepicker');
            $table->string('start_address');
            $table->string('end_address');
            $table->string('start_address_zipcode')->nullable();
            $table->string('end_address_zipcode')->nullable();
            $table->string('start_address_lat')->nullable();
            $table->string('start_address_lng')->nullable();
            $table->string('end_address_lat')->nullable();
            $table->string('end_address_lng')->nullable();
            $table->string('route_type');
            $table->decimal('total_price');
            $table->integer('luggage_count');
            $table->integer('person_count');
            $table->string('session_id')->nullable();
            $table->enum('status', ['paid', 'unpaid']);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
