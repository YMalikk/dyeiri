<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->integer('status')->default(1);
            $table->ingerer('category_id')->unsigned();
            $table->foreign('category_id')->references('categories')->on('id');
            $table->integer('chef_id')->unsigned();
            $table->foreign('user_id')->references('chef')->on('id');
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
        Schema::dropIfExists('gallery_foods');
    }
}
