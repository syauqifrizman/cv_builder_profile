<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project_details = [
            [
                'description' => 'Make Android App using Java in 4-person team',
                'project_id' => 1,
            ],
            [
                'description' => 'Enable ask quetion anonymously to Professors',
                'project_id' => 2,
            ],
            [
                'description' => null,
                'project_id' => 3,
            ],
        ];
        DB::table('project_details')->insert($project_details);
    }
}
