<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Documents')->insert([
            'title' => 'CV orang ganteng',
            'created_time' => '2023-11-29 10:10:10',
            'user_id' => 1,
        ]);
    }
}
