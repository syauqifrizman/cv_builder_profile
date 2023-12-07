<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experiences = [
            [
                'company_name'=> 'TokTok Shop',
                'position'=> 'Software Engineering',
                'company_location'=> 'Jakarta, Indonesia',
                'company_description'=> 'E-Commerce Online Shop - Largest Company',
                'start_date'=>'2022-01-01',
                'end_date' => '2022-12-31',
                'type_id' => 1,
                'document_id' => 1,
            ],
            [
                'company_name'=> 'HIMTI',
                'position'=> 'Lead Web Dev Division',
                'company_location'=> 'Jakarta, Indonesia',
                'company_description'=> null,
                'start_date'=>'2021-01-01',
                'end_date' => '2023-06-25',
                'type_id' => 2,
                'document_id' => 1,
            ],
            [
                'company_name'=> 'HIMTI',
                'position'=> 'Education Division',
                'company_location'=> 'Jakarta, Indonesia',
                'company_description'=> null,
                'start_date'=>'2021-01-01',
                'end_date' => '2021-12-25',
                'type_id' => 2,
                'document_id' => 2,
            ],
        ];
        DB::table('experiences')->insert($experiences);
    }
}
