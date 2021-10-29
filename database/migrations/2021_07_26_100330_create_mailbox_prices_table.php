<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailBoxPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailbox_prices', function (Blueprint $table) {
            $table->id();

            $table->decimal('customer_2', 5, 2);
            $table->decimal('customer_3', 5, 2);
            $table->decimal('personal_mode', 5, 2);
            $table->decimal('personal_plus_mode', 5, 2);
            $table->decimal('business_mode', 5, 2);
            $table->decimal('corporate_mode', 5, 2);
            $table->decimal('rental_fee', 5, 2);
            $table->decimal('refundable_deposit', 5, 2);
            $table->decimal('rental_month', 5, 2)->nullable();
            $table->decimal('rental_year',5,2)->nullable();
            $table->string('expired_msg')->nullable();

            $table->unsignedBigInteger('agent_id')->index();

            $table->foreign('agent_id')->references('id')->on('users')
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
        Schema::dropIfExists('mail_box_prices');
    }
}
