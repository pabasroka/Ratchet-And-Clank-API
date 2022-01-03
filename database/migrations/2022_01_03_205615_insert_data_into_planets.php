<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertDataIntoPlanets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('planets')->insert(
            array(
                'galaxy_id' => 1,
                'name' => 'Kerwan',
                'description' => 'Kerwan was the home of Captain Qwark, where he grew up, and attended the Kerwan Learning Annex to draw schematics. It was also the home of heroes Quaternion X and Captain Starshield, the latter of whom had earned the title Citizen of the Millennium.',
                'image' => '',
                'approve' => 1
            )
        );

        DB::table('planets')->insert(
            array(
                'galaxy_id' => 2,
                'name' => 'Endako',
                'description' => 'It is an urban planet home to the sprawling city of Megapolis, and a hub for Megacorp. Megapolis is noted for its expansive skyline of pristine, modern buildings, circling a large structure with two towers and robot cleaners.',
                'image' => '',
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
