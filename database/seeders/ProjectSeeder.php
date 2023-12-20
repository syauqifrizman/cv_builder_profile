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
        $projects = [
            [
                'project_name' => 'Classroom App',
                'year' => 2022,
                'project_url' => 'https://github.com/johndoe/classroomapp',
                'document_id' => 1,
            ],
            [
                'project_name' => 'Ramen Web App',
                'year' => 2016,
                'project_url' => null,
                'document_id' => 1,
            ],
            [
                'project_name' => null,
                'year' => null,
                'project_url' => null,
                'document_id' => 2,
            ],
        ];
        DB::table('projects')->insert($projects);
    }
}
