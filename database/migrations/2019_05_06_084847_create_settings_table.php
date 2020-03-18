<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{

    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->string('fullName')->nullable();
            $table->string('address')->nullable();
            $table->string('mail')->nullable();
            $table->string('mobileNumber')->nullable();
            $table->string('fax')->nullable();
            $table->string('facebookUrl')->nullable();
            $table->string('googleUrl')->nullable();
            $table->string('linkedInUrl')->nullable();
            $table->string('twitterUrl')->nullable();
            $table->string('instagramUrl')->nullable();
            $table->string('youtubeUrl')->nullable();
            $table->string('gitHupUrl')->nullable();
            $table->string('logo')->nullable();
            $table->string('footerLogo')->nullable();
            $table->string('icon')->nullable();
            $table->longText('keyWords_ar')->nullable();
            $table->longText('keyWords_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_en')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
