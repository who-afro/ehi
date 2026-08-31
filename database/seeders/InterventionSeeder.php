<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class InterventionSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'interventions';
        $this->filename = database_path('seeders/csv/interventions.csv');
    }

    public function run(): void
    {
        DB::table($this->table)->truncate();

        parent::run();
    }
}
