<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeProgramAreaTranslatable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::beginTransaction();
        Schema::table('program_areas', function (Blueprint $table) {
            $table->text('name')->change();
            $table->text('description')->change();
        });

        // move the name and text to JSON format
        DB::statement("UPDATE program_areas set `name` = JSON_OBJECT('en', name), `description` = JSON_OBJECT('en', description)");

        DB::commit();
    }
}
