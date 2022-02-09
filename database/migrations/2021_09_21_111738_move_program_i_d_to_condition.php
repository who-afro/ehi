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
        Schema::disableForeignKeyConstraints();
        Schema::table('conditions', function (Blueprint $table) {
            $table->foreignId('program_area_id')->constrained();
        });

        // move the program ids to the condition table
        DB::statement('UPDATE conditions c SET program_area_id = (SELECT pac.program_area_id FROM program_area_conditions pac WHERE  pac.condition_id = c.id)');

        Schema::drop('program_area_conditions');

        Schema::enableForeignKeyConstraints();
    }
};
