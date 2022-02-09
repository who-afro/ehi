<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_areas', function (Blueprint $table) {
            $table->string('slug');
        });

        // set the slug
        DB::statement('UPDATE program_areas SET slug = REPLACE(REPLACE(REPLACE(TRIM(LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, "$.en")))), " ", "-"), ",", ""), "--", "-")');
    }
};
