<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertDataIntoGalaxies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('galaxies')->insert(
            array(
                'name' => 'Solana',
                'approve' => 1
            )
        );

        DB::table('galaxies')->insert(
            array(
                'name' => 'Bogon',
                'approve' => 1
            )
        );

        DB::table('galaxies')->insert(
            array(
                'name' => 'Polaris',
                'approve' => 1
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
