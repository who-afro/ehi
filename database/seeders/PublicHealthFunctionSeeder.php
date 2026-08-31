<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class PublicHealthFunctionSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'public_health_functions';
        $this->filename = database_path('seeders/csv/public_health_functions.csv');
    }

    public function run(): void
    {
        DB::table($this->table)->truncate();

        parent::run();
    }
}
