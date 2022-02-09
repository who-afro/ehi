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
        Schema::table('public_health_functions', function (Blueprint $table) {
            $table->string('slug');
        });

        // set the slug
        DB::statement("UPDATE public_health_functions SET slug = LOWER(REPLACE(name, ' ', '-'))");
    }
};
