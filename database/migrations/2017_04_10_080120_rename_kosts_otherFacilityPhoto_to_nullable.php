<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameKostsOtherFacilityPhotoToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kosts', function (Blueprint $table) {
            $table->string('otherFacilityPhoto')->nullabel()->change();
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
            $table->string('otherFacilityPhoto')->change();
        });
    }
}
