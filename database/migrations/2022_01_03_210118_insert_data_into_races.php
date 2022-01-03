<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertDataIntoRaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
          ['name' => 'Lombax', 'approve' => 1],
          ['name' => 'Cragmite', 'approve' => 1],
          ['name' => 'Zoni', 'approve' => 1],
          ['name' => 'Blarg', 'approve' => 1],
          ['name' => 'Agorian', 'approve' => 1],
          ['name' => 'Cazares', 'approve' => 1],
          ['name' => 'Drophyd', 'approve' => 1],
          ['name' => 'Fongoid', 'approve' => 1],
          ['name' => 'Grummel', 'approve' => 1],
          ['name' => 'Grungarian', 'approve' => 1],
          ['name' => 'Helio-grub', 'approve' => 1],
          ['name' => 'Hoolefoid', 'approve' => 1],
          ['name' => 'Kerchu', 'approve' => 1],
          ['name' => 'Loki', 'approve' => 1],
          ['name' => 'Markazian', 'approve' => 1],
          ['name' => 'Morts', 'approve' => 1],
          ['name' => 'Nanophyte', 'approve' => 1],
          ['name' => 'Nether', 'approve' => 1],
          ['name' => 'Pterodactyl', 'approve' => 1],
          ['name' => 'Sheep', 'approve' => 1],
          ['name' => 'Skreeduck', 'approve' => 1],
          ['name' => 'Technomite', 'approve' => 1],
          ['name' => 'Terachnoid', 'approve' => 1],
          ['name' => 'Terraklon', 'approve' => 1],
          ['name' => 'Tharpod', 'approve' => 1],
          ['name' => 'Thug', 'approve' => 1],
          ['name' => 'Troglosaur', 'approve' => 1],
          ['name' => 'Tyhrranoids', 'approve' => 1],
          ['name' => 'Voltan Ivy', 'approve' => 1],
          ['name' => 'Vullard', 'approve' => 1],
          ['name' => 'Zeta Virus', 'approve' => 1],
          ['name' => 'unknown', 'approve' => 1],
        ];
        DB::table('races')->insert($data);
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
