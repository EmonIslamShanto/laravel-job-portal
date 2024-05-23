<?php

namespace Database\Seeders;

use App\Models\IndustryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industryTypes = [
            'Agriculture',
            'Automotive',
            'Banking',
            'Construction',
            'Education',
            'Energy',
            'Entertainment',
            'Fashion',
            'Finance',
            'Food',
            'Healthcare',
            'Hospitality',
            'Insurance',
            'Manufacturing',
            'Media',
            'Mining',
            'Pharmaceutical',
            'Real Estate',
            'Retail',
            'Technology',
            'Telecommunications',
            'Transportation',
            'Travel',
            'Utilities',
            'Other',
        ];

        foreach ($industryTypes as $type) {
            $industryType = new IndustryType();
            $industryType->name = $type;
            $industryType->save();
        }
    }
}
