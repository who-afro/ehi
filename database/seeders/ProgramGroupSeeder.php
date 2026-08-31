<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class ProgramGroupSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'program_groups';
        $this->filename = database_path('seeders/csv/program_groups.csv');
    }

    public function run(): void
    {
        DB::table($this->table)->truncate();

        parent::run();
    }
}
