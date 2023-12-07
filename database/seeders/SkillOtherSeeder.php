<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillOtherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skill_others = [
            [
                'title' => 'Languages',
                'description' => 'Java, Typescript, React, Go, Swift',
                'document_id' => 1,
            ],
            [
                'title' => 'Technologies',
                'description' => 'MySQL, Postgres, AWS, Git, BigQuery, Apache Spark',
                'document_id' => 2,
            ],
            [
                'title' => 'Other',
                'description' => 'Data structures and algorithms',
                'document_id' => 1,
            ],
        ];
        DB::table('skill_others')->insert($skill_others);
    }
}
