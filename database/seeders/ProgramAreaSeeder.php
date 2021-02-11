<?php

namespace Database\Seeders;

use App\Models\ProgramArea;
use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramAreaSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'program_areas';
        $this->filename = base_path().'/database/seeders/csv/program_areas.csv';
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
