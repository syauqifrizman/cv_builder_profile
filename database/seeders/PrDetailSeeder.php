<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('Pr_Details')->insert([
            'detail_id' => 1,
            'description' => 'Make Android App using Java in 4-person team',
        ]);
        DB::table('Pr_Details')->insert([
            'detail_id' => 2,
            'description' => 'Enable ask quetion anonymously to Professors',
        ]);
    }
}
