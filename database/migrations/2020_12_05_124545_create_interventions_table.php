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
            $table->foreignId('intervention_level_id')->index()->constrained();
            $table->foreignId('public_health_function_id')->index()->constrained();
            $table->foreignId('condition_id')->index()->constrained();
            $table->foreignId('age_cohort_id')->index()->constrained();
            $table->unique(['intervention_level_id', 'public_health_function_id', 'condition_id', 'age_cohort_id'], 'intervention_unique_categorization');
        });

        Schema::disableForeignKeyConstraints();
        // run the baseline data seeder
        Artisan::call('db:seed', [
            '--class' => 'InterventionSeeder',
        ]);
        Schema::enableForeignKeyConstraints();
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
