<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HourlyPackageSlabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hourlyPackageSlabs = [
            [
                'id' => 1,
                'hourly_package_id' => 1,
                'car_id' => 3,
                'hourly_slap' => '1',
                'extra_hourly_price' => 100.00,
                'created_at' => '2024-03-22 17:02:31',
                'updated_at' => '2024-03-22 17:02:31',
            ],
            [
                'id' => 2,
                'hourly_package_id' => 1,
                'car_id' => 3,
                'hourly_slap' => '2',
                'extra_hourly_price' => 200.00,
                'created_at' => '2024-03-22 17:02:31',
                'updated_at' => '2024-03-22 17:02:31',
            ],
            // Add all other hourly package slab data here following the same structure
            [
                'id' => 9,
                'hourly_package_id' => 2,
                'car_id' => 2,
                'hourly_slap' => '6',
                'extra_hourly_price' => 1000.00,
                'created_at' => '2024-03-22 17:03:55',
                'updated_at' => '2024-03-22 17:03:55',
            ],
        ];

        // Insert data into hourly_package_slabs table
        DB::table('hourly_package_slabs')->insert($hourlyPackageSlabs);
    }
}
