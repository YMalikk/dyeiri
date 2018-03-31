<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content',500)->nullable(); //commentaire
            $table->integer('status');
            $table->integer('chef_id')->unsigned();
            $table->foreign('chef_id')->references('id')->on('chef');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('review_rating_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type'); //1 respond time, 2 food
            $table->integer('status')->nullable();
            $table->timestamps();
        });

        Schema::create('review_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->double('rating');
            $table->integer('review_id')->unsigned();
            $table->foreign('review_id')->references('id')->on('reviews');
            $table->integer('rating_type_id')->unsigned();
            $table->foreign('rating_type_id')->references('id')->on('review_rating_types');
            $table->timestamps();
        });
        Schema::create('food_order_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->integer('status');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('food_id')->unsigned();
            $table->foreign('food_id')->references('id')->on('foods');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->timestamps();
        });

        Schema::create('food_order_review_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->double('rating');
            $table->integer('food_order_review_id')->unsigned();
            $table->foreign('food_order_review_id')->references('id')->on('food_order_reviews');
            $table->integer('rating_type_id')->unsigned();
            $table->foreign('rating_type_id')->references('id')->on('review_rating_types');
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
        Schema::dropIfExists('review_ratings');
        Schema::dropIfExists('review_rating_types');
        Schema::dropIfExists('reviews');
    }
}
