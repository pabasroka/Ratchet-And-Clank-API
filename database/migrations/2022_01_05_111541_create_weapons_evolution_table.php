<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaponsEvolutionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapons_evolution', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('weapon_id');
            $table->string('name', 32);
            $table->integer('max_level')->nullable();
            $table->decimal('price',11)->nullable();
            $table->enum('range', ['low', 'medium', 'high', 'melee'])->nullable();
            $table->enum('rate_of_fire', ['low', 'medium', 'high'])->nullable();
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
        Schema::dropIfExists('weapons_evolution');
    }
}
