<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Insetdataintogames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert(
            array(
                'email' => 'pabasroka@gmail.com',
                'password' => '$2y$10$hbjbyDhu2EbgSazixAUB1OQdheHzk/1YA5N89K.SjIa1in/KkPqUy',
            )
        );

        DB::table('games')->insert(
            array(
                'title' => 'Ratchet and Clank',
                'subtitle' => 'Going Commando',
                'image' => '1640643401-Ratchet.jpg',
                'developers' => 'Insomniac Games',
                'directors' => '',
                'composer' => '',
                'approve' => 0
            )
        );

        DB::table('platforms')->insert(
            array(
                'game_id' => 1,
                'platform' => 'PS2',
                'approve' => 0
            )
        );

        DB::table('releases')->insert(
            array(
                'game_id' => 1,
                'region' => 'JP',
                'date' => '2021-12-16',
                'approve' => 0
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
