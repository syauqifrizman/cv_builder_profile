<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Skill_OtherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Skills_Others')->insert([
            'skill_other_id' => 1,
            'title' => 'Languages',
            'description' => 'Java, Typescript, React, Go, Swift',
        ]);
        DB::table('Skills_Others')->insert([
            'skill_other_id' => 2,
            'title' => 'Technologies',
            'description' => 'MySQL, Postgres, AWS, Git, BigQuery, Apache Spark',
        ]);
        DB::table('Skills_Others')->insert([
            'skill_other_id' => 3,
            'title' => 'Other',
            'description' => 'Data structures and algorithms',
        ]);
    }
}
