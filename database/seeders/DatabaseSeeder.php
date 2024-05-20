<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StateSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(ServiceTypeSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CarCategorySeeder::class);
        $this->call(CarsTableSeeder::class);
        $this->call(CarPictureSeeder::class);
        $this->call(ZonalSeeder::class);
        $this->call(FareSeeder::class);
        $this->call(HourlyPackageSeeder::class);
        $this->call(HourlyPackageSlabSeeder::class);
    }
}
