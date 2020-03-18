<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('salon_id')->nullable();
            $table->integer('payment_method')->nullable();
            $table->integer('payment_status')->nullable();
            $table->text('reservation_info')->nullable();
            $table->text('client_info')->nullable();
            $table->integer('paid_part')->nullable();
            $table->integer('total_price')->nullable();
            $table->text('card_info')->nullable();
            $table->text('notes')->nullable();
            $table->integer('card_id')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('payment_id')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
