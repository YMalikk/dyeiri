<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitchenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitchen_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->integer('status')->nullable();
            $table->integer('chef_id')->unsigned();
            $table->foreign('chef_id')->references('id')->on('chef');
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
        Schema::dropIfExists('kitchen_images');
    }
}
