<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HourlyPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hourlyPackages = [
            [
                'id' => 1,
                'package_name' => 'Party Package',
                'package_description' => 'This is party package',
                'car_id' => 3,
                'hourly_rate' => 200.00,
                'created_at' => '2024-03-22 17:02:31',
                'updated_at' => '2024-03-22 17:02:31',
            ],
            [
                'id' => 2,
                'package_name' => 'Marriage Package',
                'package_description' => 'This is Marriage package',
                'car_id' => 2,
                'hourly_rate' => 300.00,
                'created_at' => '2024-03-22 17:03:55',
                'updated_at' => '2024-03-22 17:03:55',
            ],
        ];

        // Insert data into hourly_packages table
        DB::table('hourly_packages')->insert($hourlyPackages);
    }
}
