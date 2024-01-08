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
            'service_type' => 'To Airport',
        ]);
        DB::table('service_types')->insert([
            'service_type' => 'From Airport',
        ]);
        DB::table('service_types')->insert([
            'service_type' => 'Point To Point',
        ]);
        DB::table('service_types')->insert([
            'service_type' => 'Hourly Charter',
        ]);
    }
}
