<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service_types')->insert([
            [
                'country_id' => 1,
                'service_type' => 'To Airport',
            ],
            [
                'country_id' => 2,
                'service_type' => 'From Airport',
            ],
            [
                'country_id' => 3,
                'service_type' => 'Point To Point',
            ],
            [
                'country_id' => 5,
                'service_type' => 'Hourly Charter',
            ]
        ]);
    }
}
