<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interventions', function (Blueprint $table) {
            $table->dropIndex('intervention_unique_categorization');
            $table->unique(['level_of_care_id', 'public_health_function_id', 'condition_id', 'age_cohort_id', 'confirmed_with_evidence'], 'intervention_unique_categorization');
        });
    }
};
