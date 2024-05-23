<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = ['Bangla', 'English', 'Hindi', 'Urdu', 'Arabic', 'Spanish', 'French', 'German', 'Italian', 'Chinese', 'Japanese', 'Korean', 'Russian', 'Portuguese', 'Dutch', 'Swedish', 'Norwegian', 'Danish', 'Finnish', 'Greek', 'Turkish', 'Persian', 'Hebrew', 'Thai', 'Vietnamese', 'Indonesian', 'Malay', 'Filipino', 'Swahili', 'Amharic', 'Somali', 'Oromo', 'Tigrinya', 'Kinyarwanda', 'Kirundi', 'Luganda', 'Lingala', 'Kiswahili', 'Chichewa', 'Kikuyu', 'Kinyamulenge', 'Kikongo' ];

        foreach($languages as $language) {
            $lang = new Language();
            $lang->name = $language;
            $lang->save();
        }
    }
}
