<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class PublicHealthFunctionSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'public_health_functions';
        $this->filename = base_path().'/database/seeders/csv/public_health_functions.csv';
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
