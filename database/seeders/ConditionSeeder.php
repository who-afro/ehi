<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class ConditionSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'conditions';
        $this->filename = database_path('seeders/csv/conditions.csv');
    }

    public function run(): void
    {
        DB::table($this->table)->truncate();

        parent::run();
    }
}
