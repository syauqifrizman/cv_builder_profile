<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $documents = [
            [
                'title' => 'Resume - John Doe',
                'is_public' => true,
                'created_time' => Carbon::now(),
                'user_id' => 1,
            ],
            [
                'title' => 'Curriculum Vitae - Jane Smith',
                'is_public' => false,
                'created_time' => Carbon::now(),
                'user_id' => 2,
            ],
        ];
        DB::table('documents')->insert($documents);
    }
}
