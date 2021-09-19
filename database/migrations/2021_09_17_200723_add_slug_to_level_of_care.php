<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToLevelOfCare extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('level_of_cares', function (Blueprint $table) {
            $table->string('slug');
        });

        // set the slug
        DB::statement("UPDATE level_of_cares SET slug = LOWER(REPLACE(REPLACE(name, ' ', '-'), ':', ''))");
    }
}
