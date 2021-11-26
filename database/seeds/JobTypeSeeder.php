<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobType::create([
            'name:en' => 'Full time',
            'name:ar' => 'دوام كامل',
        ]);

        JobType::create([
            'name:en' => 'Part time',
            'name:ar' => 'دوام جزئى',
        ]);
    }
}
