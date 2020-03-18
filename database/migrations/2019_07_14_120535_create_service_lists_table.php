<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceListsTable extends Migration
{
    public function up()
    {
        Schema::create('service_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('image_ar')->nullable();
            $table->string('image_en')->nullable();
            $table->string('icon')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('keyword_ar')->nullable();
            $table->text('keyword_en')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('service_lists');
    }
}
