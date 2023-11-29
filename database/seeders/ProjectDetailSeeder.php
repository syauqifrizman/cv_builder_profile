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
        DB::table('project_details')->insert([
            'description' => 'Make Android App using Java in 4-person team',
            'project_id' => 1,
        ]);
        DB::table('project_details')->insert([
            'description' => 'Enable ask quetion anonymously to Professors',
            'project_id' => 1,
        ]);
    }
}
