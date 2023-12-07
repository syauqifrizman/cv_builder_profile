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
        $personals = [
            [
                'document_id' => 1,
                'fullname' => 'John Doe',
                'domicile' => 'Jakarta',
                'email' => 'john.doe@gmail.com',
                'phone_number' => '0818412342',
                'linkedin_url' => 'https://www.linkedin.com/in/john-doe',
                'portofolio_url' => 'https://www.github.com/johndoe',
                'description' => 'John is an accomplished Chief Technology Officer with a successful background in driving product and engineering strategies. Currently leading technology initiatives at PASS3, he has a proven track record of achieving rapid revenue growth and fostering a culture of quick execution. John expertise spans global team management, revenue optimization, and impactful contributions at renowned companies like Facebook. With a B. Eng in Informatics from Institut Teknologi Bandung, Listiarso combines technical proficiency with strategic leadership in the tech industry.',
            ],
            [
                'document_id' => 2,
                'fullname' => 'Jane Smith',
                'domicile' => 'Bandung',
                'email' => 'jane.smith@gmail.com',
                'phone_number' => '082231223523',
                'linkedin_url' => 'https://www.linkedin.com/in/jane-smith',
                'portofolio_url' => 'https://www.github.com/janesmith',
                'description' => 'Jane Smith is a seasoned Chief Technology Officer known for driving impactful product and engineering strategies. Currently at InnovateTech, she has successfully led teams to achieve substantial revenue growth and implemented a culture of innovation and efficiency. With a background at leading tech firms, including CloudSolutions and TechAdvance, Jane brings a wealth of experience in global team management and revenue optimization. Holding a B. Eng in Computer Science from TechInstitute, Jane is a dynamic leader poised to make significant contributions to the tech industry.',
            ],
        ];
        DB::table('personals')->insert($personals);
    }
}
