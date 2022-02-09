<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeInterventionCategoriesToServiceArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::rename('intervention_categories', 'service_areas');
        Schema::rename('intervention_intervention_category', 'intervention_service_area');
        Schema::table('intervention_service_area', function (Blueprint $table) {
            $table->renameColumn('intervention_category_id', 'service_area_id');
            $table->foreign('service_area_id')->references('id')->on('service_areas');
        });
        Schema::enableForeignKeyConstraints();
    }
}
