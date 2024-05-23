<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::insert([
            ['name' => 'Entry Level'],
            ['name' => 'Mid Level'],
            ['name' => 'Senior Level'],
            ['name' => 'Lead Level'],
            ['name' => 'Manager Level'],
            ['name' => 'Director Level'],
            ['name' => 'Executive Level'],
        ]);
    }
}
