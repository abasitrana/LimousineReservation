<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'role' => 'Administrator',
            // Add more columns and values as needed
        ]);
        DB::table('roles')->insert([
            'role' => 'Customer',
            // Add more columns and values as needed
        ]);
        DB::table('roles')->insert([
            'role' => 'Guest',
            // Add more columns and values as needed
        ]);
    }
}
