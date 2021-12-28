<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('planet_id');
            $table->string('name', 64);
            $table->string('description', 128)->nullable();
            $table->boolean('approve')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_points');
    }
}
