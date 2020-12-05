<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class AgeCohortSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'age_cohorts';
        $this->filename = base_path().'/database/seeders/csv/age_cohorts.csv';
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();
        parent::run();
    }
}
