<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exp_description = [
            [
                'description'=> 'Meningkatkan kecepatan dan efisiensi aplikasi melalui pembaruan kode dan penyesuaian infrastruktur.',
                'experience_id'=> 1,
            ],
            [
                'description'=> 'Membangun alat dan otomatisasi untuk mendukung proses pengembangan dan pengujian pada website fakultas.',
                'experience_id'=> 2,
            ],
        ];
        //
        DB::table('experience_descriptions')->insert($exp_description);
    }
}
