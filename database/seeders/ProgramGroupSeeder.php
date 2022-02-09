<?php

namespace Database\Seeders;

use App\Models\ProgramGroup;
use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramGroupSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'program_groups';
        $this->filename = base_path().'/database/seeders/csv/program_groups.csv';
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
