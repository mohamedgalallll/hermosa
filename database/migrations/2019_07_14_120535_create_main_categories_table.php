<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('main_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('image_ar')->nullable();
            $table->string('image_en')->nullable();
            $table->string('icon')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('keyword_ar')->nullable();
            $table->text('keyword_en')->nullable();
            $table->integer('order')->nullable();
            $table->integer('status')->default(1)->nullable();
//            $table->bigInteger('parent_id')->unsigned();
//            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
//            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('main_categories');
    }
}
