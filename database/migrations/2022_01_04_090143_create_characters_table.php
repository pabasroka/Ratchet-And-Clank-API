<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('galaxy_id');
            $table->unsignedBigInteger('race_id');
            $table->unsignedBigInteger('game_id'); //first_appearance
            $table->string('name', 32);
            $table->enum('gender', ['male', 'female', 'unknown']);
            $table->enum('state', ['alive', 'dead', 'lost', 'unknown']);
            $table->string('eyes', 12)->nullable();
            $table->string('skin', 12)->nullable();
            $table->string('hair', 12)->nullable();
            $table->string("image")->nullable();
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
        Schema::dropIfExists('characters');
    }
}
