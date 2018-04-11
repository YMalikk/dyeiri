<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhichListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('which_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::create('which_list_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status');
            $table->integer('which_id');
            $table->foreign('which_id')->references('id')->on("which_list");
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on("users");

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
        Schema::dropIfExists('which_list_users');
        Schema::dropIfExists('which_list');
    }
}
