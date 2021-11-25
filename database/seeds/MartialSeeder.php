<?php

namespace Database\Seeders;

use App\Models\Martial;
use Illuminate\Database\Seeder;

class MartialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Martial::factory()->count(3)->create();
    }
}
