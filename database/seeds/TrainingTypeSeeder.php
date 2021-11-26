<?php

namespace Database\Seeders;

use App\Models\TrainingType;
use Illuminate\Database\Seeder;

class TrainingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TrainingType::create([
            'name:ar' => 'تقنى',
            'name:en' => 'تقنى',
        ]);

        TrainingType::create([
            'name:ar' => 'مهنى',
            'name:en' => 'مهنى',
        ]);

        TrainingType::create([
            'name:ar' => 'إداري',
            'name:en' => 'إدارى',
        ]);
        
        TrainingType::create([
            'name:ar' => 'لا يوجد',
            'name:en' => 'لا يوجد',
        ]);
    }
}
