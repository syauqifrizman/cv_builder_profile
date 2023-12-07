<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educations = [
            [
                'document_id' => 1,
                'education_name' => 'SUNIB UNIVERSITY',
                'education_location' => 'Jakarta',
                'education_level' => 'Undergraduate',
                'education_major' => 'Computer Science',
                'current_score' => 3.54,
                'max_score' => 4.00,
                'start_date' => '2022-10-10',
                'end_date' => '2026-10-10',
                'related_coursework' => 'Object Oriented Programming, Data Structure, Database, Pattern Software Design',
            ],
            [
                'document_id' => 2,
                'education_name' => 'ITSUNIB UNIVERSITY',
                'education_location' => 'Bandung',
                'education_level' => 'Undergraduate',
                'education_major' => 'Information System',
                'current_score' => 3.84,
                'max_score' => 4.00,
                'start_date' => '2021-10-10',
                'end_date' => '2025-10-10',
                'related_coursework' => null,
            ],
        ];
        DB::table('educations')->insert($educations);
    }
}
