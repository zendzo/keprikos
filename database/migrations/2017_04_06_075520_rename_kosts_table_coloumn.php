<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameKostsTableColoumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kosts', function (Blueprint $table) {
            $table->renameColumn('logitude', 'longitude');
            $table->renameColumn('subdsitrict','subdistrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kosts', function (Blueprint $table) {
            $table->renameColumn('longitude', 'logitude');
            $table->renameColumn('subdistrict','subdsitrict');
        });
    }
}
