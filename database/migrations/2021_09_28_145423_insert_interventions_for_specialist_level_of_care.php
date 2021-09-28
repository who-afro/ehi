<?php

use Illuminate\Database\Migrations\Migration;

class InsertInterventionsForSpecialistLevelOfCare extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // duplicate all the interventions at the general level of care to the specialist level of care
        // As the general services are also available at specialist levels
        DB::statement('INSERT INTO interventions(condition_id, age_cohort_id, level_of_care_id, public_health_function_id, details, details_original, uuid, created_at)
SELECT i.condition_id, i.age_cohort_id, 4, i.public_health_function_id, i.details, i.details_original, LOWER(uuid()), CURRENT_DATE() FROM interventions i WHERE i.level_of_care_id = 3');
    }
}
