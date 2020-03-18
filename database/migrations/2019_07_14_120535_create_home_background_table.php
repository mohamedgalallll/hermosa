<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeBackgroundTable extends Migration
{
    public function up()
    {
        Schema::create('home_background', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img_ar')->nullable();
            $table->string('img_en')->nullable();
            $table->longText('text_ar')->nullable();
            $table->longText('text_en')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('home_background');
    }
}
