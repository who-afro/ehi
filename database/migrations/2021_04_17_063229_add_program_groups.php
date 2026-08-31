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
        Schema::create('program_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->uuid('uuid')->unique();
            $table->timestamps();
        });

        // add a program_group foreign key to program areas
        Schema::table('program_areas', function (Blueprint $table) {
            $table->foreignId('program_group_id')->after('description');
        });

    }
};
