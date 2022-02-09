<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultUserLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->updateOrInsert([
            'id' => '1',
            'name' => 'System Admin',
            'email' => 'ehi@styxtechgroup.com',
            'password' => Hash::make('Admin123'),
            'current_team_id' => '1',
        ]);
        DB::table('teams')->updateOrInsert([
            'id' => '1',
            'user_id' => '1',
            'name' => 'System Team',
            'personal_team' => '1',
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
