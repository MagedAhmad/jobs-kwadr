<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create([
            'name:ar' => '	مهارات بناء الوعي الذاتي',
            'name:en' => 'Self-awareness building skills',
        ]);
    }
}
