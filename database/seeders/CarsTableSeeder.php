<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $cars = [
            [
                'id' => 1,
                'car_name' => 'Infiniti Q3',
                'car_registration_number' => 'ABC 123',
                'car_description' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.',
                'car_category_id' => 1,
                'car_base_fare' => 100.00,
                'max_capacity' => 4,
                'max_luggage' => 3,
                'created_at' => '2024-02-05 13:25:37',
                'updated_at' => '2024-02-05 13:25:37',
            ],
            [
                'id' => 2,
                'car_name' => 'Mercedes AMG 300',
                'car_registration_number' => 'ABC 300',
                'car_description' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.',
                'car_category_id' => 3,
                'car_base_fare' => 200.00,
                'max_capacity' => 2,
                'max_luggage' => 1,
                'created_at' => '2024-02-05 13:25:37',
                'updated_at' => '2024-02-05 13:25:37',
            ],
            [
                'id' => 3,
                'car_name' => 'Dodge',
                'car_registration_number' => 'Dodge',
                'car_description' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.',
                'car_category_id' => 3,
                'car_base_fare' => 200.00,
                'max_capacity' => 2,
                'max_luggage' => 1,
                'created_at' => '2024-02-05 13:26:50',
                'updated_at' => '2024-02-05 13:26:50',
            ],
        ];

        // Insert data into cars table
        DB::table('cars')->insert($cars);
    }
}
