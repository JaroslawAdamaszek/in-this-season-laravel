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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->integer('team_id');
            $table->string('logo');
            $table->string('group');
            $table->string('name');
            $table->integer('rank');
            $table->integer('last_rank');
            $table->integer('points');
            $table->string('form');
            $table->integer('all_played');
            $table->integer('all_win');
            $table->integer('all_draw');
            $table->integer('all_lose');
            $table->string('all_goals_for');
            $table->string('all_goals_against');
            $table->string('date_api_update');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
};
