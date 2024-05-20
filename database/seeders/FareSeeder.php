<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("
            INSERT INTO `fares` (`id`, `car_id`, `zone_from`, `zone_to`, `fare`, `created_at`, `updated_at`) VALUES
            (1, 2, 1, 1, 10.00, '2024-02-19 21:42:21', '2024-02-19 21:42:23'),
            (2, 2, 1, 2, 20.00, '2024-02-19 21:42:21', '2024-02-19 21:42:23'),
            (3, 2, 1, 3, 30.00, '2024-02-19 21:42:21', '2024-02-19 21:42:23'),
            (4, 3, 1, 4, 40.00, '2024-02-19 21:42:21', '2024-02-19 21:42:23'),
            (5, 1, 1, 5, 50.00, '2024-02-19 18:21:41', '2024-02-19 18:21:41'),
            (8, 2, 2, 1, 15.00, '2024-02-21 04:56:05', '2024-02-21 04:56:06'),
            (9, 3, 2, 2, 30.00, '2024-02-21 04:57:27', '2023-02-21 04:57:28'),
            (10, 1, 2, 3, 45.00, '2024-02-21 04:57:32', '2022-02-21 04:57:32'),
            (11, 3, 2, 4, 55.00, '2024-02-21 04:57:35', '2023-02-21 04:57:35'),
            (12, 2, 2, 5, 70.00, '2024-02-21 04:57:37', '2024-02-21 04:57:38'),
            (13, 2, 20, 20, 100.00, '2024-02-23 03:16:49', '2024-02-23 03:16:49'),
            (14, 1, 20, 20, 10.00, '2024-02-23 05:52:15', '2024-02-23 05:52:15');
        ");
    }
}
