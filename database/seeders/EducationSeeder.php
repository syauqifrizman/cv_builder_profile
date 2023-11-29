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
        DB::table('Educations')->insert([
            'document_id' => 1,
            'education_name' => 'BINUS IKN',
            'education_location' => 'Jl. Jokowi no.1',
            'education_level' => 'Undergraduate',
            'education_major' => 'Computer Science',
            'current_score' => 3.54,
            'start_date' => '2022-10-10',
            'end_date' => '2026-10-10',
        ]);
    }
}
