<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Exp_DescriptionSeeder extends Seeder
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
                'description'=> 'Mengelola dan mengoptimalkan database untuk meningkatkan kinerja kueri.',
                'experience_id'=> 1,
            ],
            [
                'description'=> 'Merancang dan mengimplementasikan fitur-fitur kunci yang meningkatkan fungsionalitas dan kinerja aplikasi.',
                'experience_id'=> 2,
            ],
            [
                'description'=> 'Membangun alat dan otomatisasi untuk mendukung proses pengembangan dan pengujian.',
                'experience_id'=> 2,
            ],
        ];
        //
        DB::table('Exp_Descriptions')->insert($exp_description);
    }
}
