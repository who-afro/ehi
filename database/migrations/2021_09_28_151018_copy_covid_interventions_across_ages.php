<?php

use Illuminate\Database\Migrations\Migration;

class CopyCovidInterventionsAcrossAges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Copy the COVID19 interventions from 12 to 24 to the age cohort 25 to 59
        DB::statement('INSERT INTO interventions(condition_id, age_cohort_id, level_of_care_id, public_health_function_id, details, details_original, uuid, created_at)
SELECT i.condition_id, 5, i.level_of_care_id, i.public_health_function_id, i.details, i.details_original, LOWER(uuid()), CURRENT_DATE() FROM interventions i WHERE i.age_cohort_id = 4 AND i.condition_id = 74');

        // Copy the COVID19 interventions from 12 to 24 to the age cohort 60+
        DB::statement('INSERT INTO interventions(condition_id, age_cohort_id, level_of_care_id, public_health_function_id, details, details_original, uuid, created_at)
SELECT i.condition_id, 6, i.level_of_care_id, i.public_health_function_id, i.details, i.details_original, LOWER(uuid()), CURRENT_DATE() FROM interventions i WHERE i.age_cohort_id = 4 AND i.condition_id = 74');
    }
}
