<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class AgeCohortSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'age_cohorts';
        $this->filename = database_path('seeders/csv/age_cohorts.csv');
    }

    public function run(): void
    {
        DB::table($this->table)->truncate();

        parent::run();
    }
}
