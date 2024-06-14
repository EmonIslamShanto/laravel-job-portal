<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $top_job_categories = array(
            "Healthcare",
            "Technology",
            "Business and Finance",
            "Education",
            "Construction",
            "Manufacturing",
            "Sales and Marketing",
            "Transportation and Logistics",
            "Green Jobs",
            "Creative and Media"
        );

        foreach ($top_job_categories as $category) {
            $job_category = new JobCategory();
            $job_category->icon = 'fas fa-dot-circle';
            $job_category->name = $category;
            $job_category->save();
        }

    }
}
