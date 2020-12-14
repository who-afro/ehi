<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class InterventionLevelSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'intervention_levels';
        $this->filename = base_path().'/database/seeders/csv/intervention_levels.csv';
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
