<?php

namespace Database\Seeders;

use App\Models\TeamSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamSize::insert([
            ['name'=> 'only me',
            'slug' => 'only-me'
            ],
            ['name'=> '2-10 Members',
            'slug' => '2-10-members'
            ],
            ['name'=> '11-50 Members',
            'slug' => '11-50-members'
            ],
            ['name'=> '51-200 Members',
            'slug' => '51-200-members'
            ],
            ['name'=> '201-500 Members',
            'slug' => '201-500-members'
            ],
            ['name'=> '501-1000 Members',
            'slug' => '501-1000-members'
            ],
            ['name'=> '1001-5000 Members',
            'slug' => '1001-5000-members'
            ],
            ['name'=> '5000+ Members',
            'slug' => '5000+-members'
            ],
        ]);
    }
}
