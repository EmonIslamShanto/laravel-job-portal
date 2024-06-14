<?php

namespace Database\Seeders;

use App\Models\JobExperience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experiences = array(
            "Entry Level",
            "Mid Level",
            "Senior Level",
            "Lead Level",
            "Manager Level",
            "Director Level",
            "Executive Level"
        );

        foreach($experiences as $experience) {
            $jobExperience = new JobExperience();
            $jobExperience->name = $experience;
            $jobExperience->save();
        }
    }
}
