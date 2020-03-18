<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('salon_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('team_id')->nullable();
            $table->integer('price')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
