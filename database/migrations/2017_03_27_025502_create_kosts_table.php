<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kosts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('owner');
            $table->string('ownerPhone');
            $table->string('manager');
            $table->string('managerPhone');
            $table->string('phone');
            $table->string('geoName');
            $table->string('latitude');
            $table->string('logitude');
            $table->string('subdsitrict');
            $table->string('city');
            $table->integer('priceDaily');
            $table->integer('priceWeekly');
            $table->integer('priceMonthly');
            $table->integer('priceYearly');
            $table->integer('minPay')->nullabel();
            $table->string('priceRemark')->nullabel();
            $table->integer('roomCount');
            $table->string('size');
            $table->integer('gender');
            $table->boolean('status');
            $table->integer('roomAvailable');
            $table->boolean('animal');
            $table->string('roomFacility');
            $table->string('otherRoomFacility')->nullabel();
            $table->string('bathRoomFacility');
            $table->string('otherBathRoomFacility');
            $table->integer('parking');
            $table->string('generalFacility');
            $table->string('otherGeneralFacility')->nullabel();
            $table->string('nearByFacility');
            $table->string('otherNearByFacility')->nullabel();
            $table->string('remarks')->nullable();
            $table->string('descriptions')->nullabel();
            $table->string('nameAgent');
            $table->string('emailAgent');
            $table->string('hpAgent');
            $table->string('statusAgent');
            $table->string('coverPhoto');
            $table->string('buildingPhoto');
            $table->string('roomFrontPhoto');
            $table->string('roomInsidePhoto');
            $table->string('toiletFrontPhoto');
            $table->string('toiletInsidePhoto');
            $table->string('otherFacilityPhoto');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kosts');
    }
}
