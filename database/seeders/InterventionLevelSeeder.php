<?php

namespace Database\Seeders;

use App\Models\InterventionLevel;
use Illuminate\Database\Seeder;

class InterventionLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InterventionLevel::factory()->count(5)->create();
    }
}
