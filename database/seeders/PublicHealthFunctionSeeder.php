<?php

namespace Database\Seeders;

use App\Models\PublicHealthFunction;
use Illuminate\Database\Seeder;

class PublicHealthFunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PublicHealthFunction::factory()->count(5)->create();
    }
}
