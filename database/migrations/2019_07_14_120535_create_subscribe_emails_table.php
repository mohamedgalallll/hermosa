<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribeEmailsTable extends Migration
{
    public function up()
    {
        Schema::create('subscribe_emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->enum('status', [0,1,2]);
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('subscribe_emails');
    }
}
