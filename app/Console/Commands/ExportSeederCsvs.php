<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class ExportSeederCsvs extends Command
{
    protected $signature = 'export:seeder-csvs';

    protected $description = 'Export current database tables to seeder CSV files';

    /** @var array<string, array<int, string>> */
    private array $tables = [
        'age_cohorts' => ['id', 'name', 'description', 'min_age', 'max_age', 'slug', 'uuid', 'created_at', 'updated_at'],
        'level_of_cares' => ['id', 'name', 'description', 'slug', 'uuid', 'created_at', 'updated_at'],
        'public_health_functions' => ['id', 'name', 'description', 'slug', 'sort_order', 'uuid', 'created_at', 'updated_at'],
        'conditions' => ['id', 'name', 'description', 'who', 'snomed', 'program_area_id', 'uuid', 'created_at', 'updated_at'],
        'interventions' => ['id', 'details', 'details_original', 'confirmed_with_evidence', 'uuid', 'level_of_care_id', 'public_health_function_id', 'condition_id', 'age_cohort_id', 'created_at', 'updated_at'],
        'program_groups' => ['id', 'name', 'description', 'uuid', 'created_at', 'updated_at'],
        'program_areas' => ['id', 'name', 'description', 'slug', 'uuid', 'created_at', 'updated_at', 'program_group_id'],
    ];

    public function handle(): int
    {
        foreach ($this->tables as $table => $columns) {
            $this->exportTable($table, $columns);
        }

        $this->info('All seeder CSVs exported successfully.');

        return Command::SUCCESS;
    }

    /** @param array<int, string> $columns */
    private function exportTable(string $table, array $columns): void
    {
        $csvPath = database_path("seeders/csv/{$table}.csv");
        $rows = DB::table($table)->select($columns)->orderBy('id')->get();

        $handle = fopen($csvPath, 'w');

        if ($handle === false) {
            throw new RuntimeException("Unable to write {$csvPath}.");
        }

        fputcsv($handle, $columns, ',', '"', '');

        foreach ($rows as $row) {
            $values = [];
            foreach ($columns as $col) {
                $values[] = $row->$col;
            }
            fputcsv($handle, $values, ',', '"', '');
        }

        fclose($handle);
        $this->info("Exported {$rows->count()} rows to {$table}.csv");
    }
}
