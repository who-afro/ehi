<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InterventionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::factory()->count(5)->create();
    }
}
