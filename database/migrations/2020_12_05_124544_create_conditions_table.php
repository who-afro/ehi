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
        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description');
            $table->string('who', 25)->nullable();
            $table->string('snomed', 25)->nullable();
            $table->uuid('uuid')->unique();
            $table->timestamps();
        });

        Schema::disableForeignKeyConstraints();
        // run the baseline data seeder
        Artisan::call('db:seed', [
            '--class' => 'ConditionSeeder',
        ]);
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conditions');
    }
};
