<?php

namespace Database\Seeders;

use App\Models\JobField;
use Illuminate\Database\Seeder;

class JobFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobField::create([
            'name:ar' => 'التصميم والفنون والازياء',
            'name:en' => 'Design and fashion'
        ]);

        JobField::create([
            'name:ar' => 'الاعلام والعلاقات العامة',
            'name:en' => 'Publicity and public relations'
        ]);
    }
}
