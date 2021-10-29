<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_info', function (Blueprint $table) {
            $table->id();
            $table->string('address1');
            $table->string('name_of_card');
            $table->string('address2')->nullable();
            $table->string('credit_card');
            $table->string('country', 2);
            $table->string('ex_month',2);
            $table->string('ex_year',4);
            $table->string('postal', 10);
            $table->string('cvd_code');
            $table->string('city', 20);
            $table->string('province', 20);
            $table->string('default', 1)->nullable();
            $table->unsignedBigInteger('user_id')->index();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_info');
    }
}
