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
            $table->text('conditions')->nullable()->change();
            $table->text('levels_of_care')->nullable()->change();
            $table->text('public_health_functions')->nullable()->change();
            $table->text('age_cohorts')->nullable()->change();
            $table->text('title')->change();
            $table->text('description')->nullable()->change();
            $table->text('notification_emails')->nullable()->change();
        });
    }
};
