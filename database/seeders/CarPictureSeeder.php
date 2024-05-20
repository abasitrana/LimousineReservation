<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carPictures = [
            [
                'id' => 1,
                'car_id' => 3,
                'car_picture_path' => 'https://i0.wp.com/futurestarcarrental.com/wp-content/uploads/2022/05/WhatsApp-Image-2022-05-25-at-6.44.50-PM-1.jpeg',
                'created_at' => '2024-02-05 13:26:50',
                'updated_at' => '2024-02-05 13:26:50',
            ],
            [
                'id' => 2,
                'car_id' => 1,
                'car_picture_path' => 'https://podsot.com/wp-content/uploads/2023/01/Limousine-Rent-Lahore-1-1-900x600.jpg',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'car_id' => 2,
                'car_picture_path' => 'https://rentacar-lahoredha.com/wp-content/uploads/2019/09/Lincoln-Limousine-rent-a-car-lahore-dha.jpg',
                'created_at' => null,
                'updated_at' => null,
            ],
        ];

        // Insert data into cars_pictures table
        DB::table('cars_pictures')->insert($carPictures);
    }
}
