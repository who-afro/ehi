<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // delete the existing intervention categories
        Schema::disableForeignKeyConstraints();
        DB::table('intervention_intervention_category')->delete();
        DB::table('intervention_categories')->delete();
    }
};
