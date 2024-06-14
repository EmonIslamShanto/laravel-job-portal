<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educations = array(
            "High School",
            "Vocational",
            "Diploma",
            "Bachelor's Degree",
            "Master's Degree",
            "Doctorate Degree",
            "Post Graduate Diploma",
            "Professional Degree",
            "Certification",
            "Others"
        );

        foreach($educations as $education) {
            $jobEducation = new Education();
            $jobEducation->name = $education;
            $jobEducation->save();
        }
    }
}
