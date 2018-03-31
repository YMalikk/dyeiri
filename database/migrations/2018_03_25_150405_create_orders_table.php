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
            $table->integer('chef_id')->unsigned();
            $table->foreign("chef_id")->references('id')->on("chef");
            $table->integer('client_id')->unsigned();
            $table->foreign("client_id")->references('id')->on("users");
            $table->integer('status')->default(0);
            $table->integer('price');
            $table->timestamps();
        });

        Schema::create('food_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('food_id')->unsigned();
            $table->foreign('food_id')->references('id')->on('foods');
            $table->integer('price');
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
        Schema::dropIfExists('food_orders');
        Schema::dropIfExists('orders');
    }
}
