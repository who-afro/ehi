<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class ProgramAreaSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'program_areas';
        $this->filename = database_path('seeders/csv/program_areas.csv');
    }

    public function run(): void
    {
        DB::table($this->table)->truncate();

        parent::run();
    }
}
