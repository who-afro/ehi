<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AssignProgramAreasAndInterventionGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Program Areas
        // Newborn
        DB::statement('REPLACE INTO intervention_program_area (intervention_id, program_area_id)
SELECT id, 1 FROM interventions WHERE age_cohort_id = 1');
        // Child health
        DB::statement('REPLACE INTO intervention_program_area (intervention_id, program_area_id)
SELECT id, 2 FROM interventions WHERE age_cohort_id IN (2, 3)');

        // Adolescent health
        DB::statement('REPLACE INTO intervention_program_area (intervention_id, program_area_id)
SELECT id, 3 FROM interventions WHERE age_cohort_id IN (4)');

        // Mental Health
        DB::statement("REPLACE INTO intervention_program_area (intervention_id, program_area_id)
SELECT id, 7 FROM interventions WHERE details LIKE '%mental%' OR details LIKE '%psychological%'");

        // Neglected Tropical Diseases
        DB::statement('REPLACE INTO intervention_program_area (intervention_id, program_area_id)
SELECT id, 7 FROM interventions WHERE condition_id IN (14, 55, 27, 18,17,56,13)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
