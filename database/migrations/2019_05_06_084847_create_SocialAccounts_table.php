<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialAccountsTable extends Migration
{

    public function up()
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->text('avatar')->nullable();
            $table->text('avatar_original')->nullable();
            $table->text('profileUrl')->nullable();
            $table->string('social_media_id')->nullable();
            $table->string('social_media_type')->nullable();

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');


            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('social_accounts');
    }
}
