<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'type_name'=> 'Work Experience',
            ],
            [
                'type_name'=>'Organization Experience',
            ]
        ];
        DB::table('types')->insert($types);
    }
}
