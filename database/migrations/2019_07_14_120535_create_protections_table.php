<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtectionsTable extends Migration
{
    public function up()
    {
        Schema::create('protections', function (Blueprint $table) {
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
        Schema::dropIfExists('protections');
    }
}
