<?php

namespace Database\Seeders;

use App\Models\AgeCohort;
use Illuminate\Database\Seeder;

class AgeCohortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AgeCohort::factory()->count(5)->create();
    }
}
