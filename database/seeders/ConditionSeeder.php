<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class ConditionSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'conditions';
        $this->filename = base_path().'/database/seeders/csv/conditions.csv';
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
