<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{

    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('sender_id')->unsigned();
            $table->bigInteger('receiver_id')->unsigned();
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('message');
            $table->integer('read')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
