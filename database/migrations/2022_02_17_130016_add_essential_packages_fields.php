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
        Schema::table('essential_packages', function (Blueprint $table) {
            $table->string('conditions')->nullable();
            $table->string('levels_of_care')->nullable();
            $table->string('public_health_functions')->nullable();
            $table->string('age_cohorts')->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('notification_emails')->nullable();
            $table->uuid();
        });
    }
};
