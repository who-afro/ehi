<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('intervention_levels', 'level_of_cares');
        // drop the unique index for unique categorization
        Schema::table('interventions', function (Blueprint $table) {
            $table->dropUnique('intervention_unique_categorization');
        });

        // rename the intervention_level_id column
        Schema::table('interventions', function (Blueprint $table) {
            $table->renameColumn('intervention_level_id', 'level_of_care_id');
            $table->unique(['level_of_care_id', 'public_health_function_id', 'condition_id', 'age_cohort_id'], 'intervention_unique_categorization');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('level_of_care', 'intervention_levels');
        // drop the unique index for unique categorization
        Schema::table('interventions', function (Blueprint $table) {
            $table->dropUnique('intervention_unique_categorization');
        });
        Schema::table('interventions', function (Blueprint $table) {
            $table->renameColumn('level_of_care_id', 'intervention_level_id');
            $table->unique(['intervention_level_id', 'public_health_function_id', 'condition_id', 'age_cohort_id'], 'intervention_unique_categorization');
        });
    }
};
