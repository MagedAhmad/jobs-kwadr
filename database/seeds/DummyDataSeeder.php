<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FeedbackSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(ProviderSeeder::class);
//$this->call(ProfileSeeder::class);
$this->call(MartialSeeder::class);
$this->call(EducationSeeder::class);
$this->call(JobTypeSeeder::class);
$this->call(JobFieldSeeder::class);
$this->call(SkillSeeder::class);
$this->call(EmployerSeeder::class);
$this->call(SupporterSeeder::class);
$this->call(TrainingTypeSeeder::class);
/*  The seeders of generated crud will set here: Don't remove this line  */

    }
}
