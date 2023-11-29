<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Extension\PersonExtension;
use Illuminate\Database\Seeder;
use League\CommonMark\Node\Block\Document;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            DocumentSeeder::class,
            EducationSeeder::class,
            TypeSeeder::class,
            ExperienceSeeder::class,
            PersonalSeeder::class,
            ProjectSeeder::class,
            Skill_OtherSeeder::class,
            Pr_DetailSeeder::class,
            Exp_DescriptionSeeder::class,
        ]);
    }
}
