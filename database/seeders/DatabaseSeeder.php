<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        try {
            $this->call([
                ProgramGroupSeeder::class,
                ProgramAreaSeeder::class,
                AgeCohortSeeder::class,
                LevelOfCareSeeder::class,
                PublicHealthFunctionSeeder::class,
                ConditionSeeder::class,
                InterventionSeeder::class,
            ]);
        } finally {
            Schema::enableForeignKeyConstraints();
        }
    }
}
