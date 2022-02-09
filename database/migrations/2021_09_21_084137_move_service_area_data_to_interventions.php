<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MoveServiceAreaDataToInterventions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // increase the maximum size of the group_concat function
        DB::statement('SET global group_concat_max_len=15000');

        Schema::table('interventions', function (Blueprint $table) {
            $table->text('details_original');
            $table->text('details')->nullable()->change();
        });

        // move the data from the details to the details_original field
        DB::statement('UPDATE interventions SET details_original = details');

        // copy the data from the intervention_service_area table
        DB::statement("UPDATE interventions i SET details = (SELECT GROUP_CONCAT(DISTINCT isa.details SEPARATOR '\n') FROM intervention_service_area isa WHERE i.id = isa.intervention_id GROUP BY isa.intervention_id)");

        // add details_intervention for those with null values
        DB::statement('UPDATE interventions SET details = details_original WHERE details IS NULL');
    }
}
