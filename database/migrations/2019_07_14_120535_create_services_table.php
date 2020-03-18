<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('description_en')->nullable();
            $table->string('description_ar')->nullable();
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->time('time')->nullable();
            $table->float('price')->nullable();
            $table->integer('status')->default(0)->nullable();

            $table->bigInteger('salon_id')->nullable()->unsigned();
            $table->foreign('salon_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('service_list_id')->nullable()->unsigned();
            $table->foreign('service_list_id')->references('id')->on('service_lists')->onDelete('cascade');

            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
