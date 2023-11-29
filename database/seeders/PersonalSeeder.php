<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Personals')->insert([
            'document_id' => 1,
            'fullname' => 'Asep Surasep',
            'domicile' => 'Jl. Sudirman no.1',
            'email' => 'anjay@gmail.com',
            'phone_number' => '0818999999',
            'linkedin_url' => 'www.linkedin.com/in/asep-surasep',
            'portofolio_url' => 'www.figma.com',
            'description' => 'Cepet coy hire gw, gw kan ganteng eak',
        ]);
    }
}
