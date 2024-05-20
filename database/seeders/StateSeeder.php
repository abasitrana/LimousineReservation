<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("
            INSERT INTO `states` (`id`, `state`, `code`) VALUES
            (1, 'Alaska', 'AK'),
            (2, 'Alabama', 'AL'),
            (3, 'Arkansas', 'AR'),
            (4, 'Arizona', 'AZ'),
            (5, 'California', 'CA'),
            (6, 'Colorado', 'CO'),
            (7, 'Connecticut', 'CT'),
            (8, 'District of Columbia', 'DC'),
            (9, 'Delaware', 'DE'),
            (10, 'Florida', 'FL'),
            (11, 'Georgia', 'GA'),
            (12, 'Hawaii', 'HI'),
            (13, 'Iowa', 'IA'),
            (14, 'Idaho', 'ID'),
            (15, 'Illinois', 'IL'),
            (16, 'Indiana', 'IN'),
            (17, 'Kansas', 'KS'),
            (18, 'Kentucky', 'KY'),
            (19, 'Louisiana', 'LA'),
            (20, 'Massachusetts', 'MA'),
            (21, 'Maryland', 'MD'),
            (22, 'Maine', 'ME'),
            (23, 'Michigan', 'MI'),
            (24, 'Minnesota', 'MN'),
            (25, 'Missouri', 'MO'),
            (26, 'Mississippi', 'MS'),
            (27, 'Montana', 'MT'),
            (28, 'North Carolina', 'NC'),
            (29, 'North Dakota', 'ND'),
            (30, 'Nebraska', 'NE'),
            (31, 'New Hampshire', 'NH'),
            (32, 'New Jersey', 'NJ'),
            (33, 'New Mexico', 'NM'),
            (34, 'Nevada', 'NV'),
            (35, 'New York', 'NY'),
            (36, 'Ohio', 'OH'),
            (37, 'Oklahoma', 'OK'),
            (38, 'Oregon', 'OR'),
            (39, 'Pennsylvania', 'PA'),
            (40, 'Rhode Island', 'RI'),
            (41, 'South Carolina', 'SC'),
            (42, 'South Dakota', 'SD'),
            (43, 'Tennessee', 'TN'),
            (44, 'Texas', 'TX'),
            (45, 'Utah', 'UT'),
            (46, 'Virginia', 'VA'),
            (47, 'Vermont', 'VT'),
            (48, 'Washington', 'WA'),
            (49, 'Wisconsin', 'WI'),
            (50, 'West Virginia', 'WV'),
            (51, 'Wyoming', 'WY');
        ");
    }
}
