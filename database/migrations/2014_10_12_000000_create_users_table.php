<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('city')->nullable();
            $table->text('notes')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('salon_name')->nullable();
            $table->longText('salon_description')->nullable();
            $table->text('location_address')->nullable();
            $table->decimal('location_lat', 10, 8)->nullable();
            $table->decimal('location_long', 11, 8)->nullable();
            $table->string('first_phone')->nullable();
            $table->string('second_phone')->nullable();
            $table->string('third_phone')->nullable();
            $table->string('first_bank_account_name')->nullable();
            $table->bigInteger('first_bank_account_number')->nullable();
            $table->string('second_bank_account_name')->nullable();
            $table->bigInteger('second_bank_account_number')->nullable();
            $table->string('salon_image')->nullable();
            $table->string('salon_license')->nullable();

            $table->enum('salon_payment_method_online_payment', [0, 1])->default(0);
            $table->enum('salon_payment_method_cash',[0,1])->default(0);
            $table->enum('salon_payment_method_promotions', [0, 1])->default(0);
            $table->integer('salon_payment_method_promotion_value')->default(0);

            $table->text('salon_appointments')->nullable();

            $table->string('user_image')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('status')->default(0);
            $table->integer('user_type_id')->default(0);
            $table->integer('is_activated')->default(0);
            $table->string('active_hash')->default(0);
            $table->integer('admin_group')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
