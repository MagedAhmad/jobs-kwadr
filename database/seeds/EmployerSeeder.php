<?php

namespace Database\Seeders;

use App\Models\Employer;
use Illuminate\Database\Seeder;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employer::create([
            'name:ar' => 'مؤسسات وشركات القطاع الخاص',
            'name:en' => 'Private sector institutions and companies',
        ]);

        Employer::create([
            'name:ar' => 'الجمعيات الأهلية والخيرية',
            'name:en' => 'Civil and charitable associations',
        ]);
    }
}
