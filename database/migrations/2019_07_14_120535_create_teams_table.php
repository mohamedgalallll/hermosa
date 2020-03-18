<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('job_title_ar')->nullable();
            $table->string('job_title_en')->nullable();
            $table->string('image')->nullable();
            $table->longText('excerpt_ar')->nullable();
            $table->longText('excerpt_en')->nullable();

            $table->integer('status')->default(0)->nullable();

            $table->bigInteger('salon_id')->unsigned()->nullable();
            $table->foreign('salon_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('service_id')->unsigned()->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade'); 

            $table->bigInteger('service_list_id')->unsigned()->nullable();
            $table->foreign('service_list_id')->references('id')->on('service_lists')->onDelete('cascade');

            $table->integer('status_team')->default(0);
            
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
