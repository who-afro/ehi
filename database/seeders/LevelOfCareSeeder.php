<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class LevelOfCareSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'level_of_cares';
        $this->filename = database_path('seeders/csv/level_of_cares.csv');
    }

    public function run(): void
    {
        DB::table($this->table)->truncate();

        parent::run();
    }
}
