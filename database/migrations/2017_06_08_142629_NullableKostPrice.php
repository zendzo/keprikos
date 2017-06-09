<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullableKostPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kosts', function (Blueprint $table) {
            $table->dropColumn(['priceDaily','priceWeekly']);
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
            $table->string('priceDaily');
            $table->string('priceWeekly');
        });
    }
}
