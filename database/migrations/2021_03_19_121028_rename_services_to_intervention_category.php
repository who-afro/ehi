<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameServicesToInterventionCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('services', 'intervention_categories');
        Schema::rename('program_area_service', 'intervention_category_program_area');
        Schema::table('intervention_category_program_area', function (Blueprint $table) {
            $table->renameColumn('service_id', 'intervention_category_id');
        });
        Schema::rename('intervention_service', 'intervention_intervention_category');
        Schema::table('intervention_intervention_category', function (Blueprint $table) {
            $table->renameColumn('service_id', 'intervention_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('intervention_categories', 'services');
        Schema::rename('intervention_category_program_area', 'program_area_service');

        Schema::table('intervention_category_program_area', function (Blueprint $table) {
            $table->renameColumn('intervention_category_id', 'service_id');
        });
        Schema::rename('intervention_intervention_category', 'intervention_service');
        Schema::table('intervention_service', function (Blueprint $table) {
            $table->renameColumn('intervention_category_id', 'service_id');
        });
    }
}
