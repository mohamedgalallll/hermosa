<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowSalonTable extends Migration
{
    public function up()
    {
        Schema::create('show_salon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->longText('body_ar')->nullable();
            $table->longText('body_en')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('show_salon');
    }
}
