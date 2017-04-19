<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('kost_id');
            $table->integer('qty');
            $table->integer('total_month');
            $table->integer('total_price');
            $table->date('paid_at')->nullable();
            $table->date('day_in')->nullable();
            $table->date('day_out')->nullable();
            $table->timestamps();
        });

        Schema::create('kost_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kost_id');
            $table->integer('order_id');
            $table->timestamps();
        });

        Schema::create('order_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
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
        Schema::dropIfExists('orders');

        Schema::dropIfExists('kost_order');

        Schema::dropIfExists('order_user');
    }
}
