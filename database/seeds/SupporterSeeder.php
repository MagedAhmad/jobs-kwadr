<?php

namespace Database\Seeders;

use App\Models\Supporter;
use Illuminate\Database\Seeder;

class SupporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supporter::create([
            'name:ar' => 'صندوق الموادر البشرية',
            'name:en' => 'صندوق الموادر البشرية',
        ]);

        Supporter::create([
            'name:ar' => 'الجمعيات الأهلية والخيرية',
            'name:en' => 'الجمعيات الأهلية والخيرية',
        ]);

        Supporter::create([
            'name:ar' => 'الغرفه التجارية',
            'name:en' => 'الغرفه التجارية',
        ]);

        Supporter::create([
            'name:ar' => 'المؤسسات الوقفية',
            'name:en' => 'المؤسسات الوقفية',
        ]);
    }
}
