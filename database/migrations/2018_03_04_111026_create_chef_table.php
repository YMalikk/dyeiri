<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('chef', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('country')->nullable();
            $table->string('speciality')->nullable();
            $table->string('cover_photo')->nullable();
            $table->integer('likes_count');
            $table->string("description")->nullable();
            $table->string("work")->nullable();
            $table->string("language")->nullable();
            $table->integer('status')->default(0);
            $table->integer('user_id')->unsigned();
            $table->foreign("user_id")->references('id')->on("users");
            $table->timestamps();
        });

        Schema::create('verified_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string("cin_status");
            $table->string("mobile_status");
            $table->string("gallery_status");
            $table->integer('chef_id')->unsigned();
            $table->foreign("chef_id")->references('id')->on("users");
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
        Schema::dropIfExists('verified_information');
        Schema::dropIfExists('chef');
    }
}
