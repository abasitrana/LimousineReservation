<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars_categories')->insert([
            [
                'category_name' => 'Limousine',
                'category_image' => '/storage/31343C.svg'
            ],
            [
                'category_name' => 'SUV',
                'category_image' => '/storage/31343C.svg'
            ],
            [
                'category_name' => 'Sports',
                'category_image' => '/storage/31343C.svg'
            ]
        ]);
    }
}
