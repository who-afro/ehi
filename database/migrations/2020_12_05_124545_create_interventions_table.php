<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->text('details');
            $table->timestamps();
            $table->uuid('uuid')->unique();
            $table->foreignId('intervention_id')->index()->constrained();
            $table->foreignId('intervention_level_id')->index()->constrained();
            $table->foreignId('condition_id')->index()->constrained();
            $table->foreignId('age_cohort_id')->index()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interventions');
    }
}
