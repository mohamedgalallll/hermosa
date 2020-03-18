<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('salon_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique()->nullable();
            $table->string('name')->nullable();
            $table->integer('reviews_rate')->nullable();
            $table->text('reviews_text')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('salon_id')->unsigned();
            $table->foreign('salon_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('salon_reviews');
    }
}
