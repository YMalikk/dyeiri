<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryManTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_man', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); // 1 available, 2 working, 0 unavailable
            $table->integer('transport'); //1 bicy , 2 motor, 3 cars
            $table->integer('smartphone'); //1 iphone, 2 android
            $table->integer('driver_license'); //1 oui , 0 non
            $table->integer('student'); //1 oui , 0 non
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        
        Schema::create('delivery_times', function (Blueprint $table) {
            $table->increments('id');
            $table->time('time');
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
      //  Schema::dropIfExists('schedule_chef');
        Schema::dropIfExists('delivery_mans');
        Schema::dropIfExists('delivery_times');
    }
}
