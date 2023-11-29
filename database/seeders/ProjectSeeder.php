<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            'project_name' => 'Classroom App',
            'end_date' => '2022-12-31',
            // 'project_url' => 'null,'
            'document_id' => 1,// Nullable URL
        ]);
    }
}
