<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->text('trans_code')->nullable();
            $table->float('price');
            $table->string('currency', 3)->default("CAD");
            $table->string('status', 12)->comment('successful|unsuccessful');
            $table->string('payed_by')->comment('paypal|credit_card');
            $table->string('system_check', 1)->default('0')->comment('0:not check, 1: check');
            $table->unsignedBigInteger('parcel_id')->index()->nullable();
            $table->unsignedBigInteger('envelop_id')->index()->nullable();
            $table->unsignedBigInteger('faxing_id')->index()->nullable();
            $table->unsignedBigInteger('printing_id')->index()->nullable();
            $table->unsignedBigInteger('scanning_id')->index()->nullable();
            $table->unsignedBigInteger('agent_id')->index()->nullable();
//            $table->unsignedBigInteger('mailbox_id')->index()->nullable();
//            $table->unsignedBigInteger('pickup_id')->index()->nullable();
            $table->unsignedBigInteger('user_id')->index()->nullable();

            $table->foreign('parcel_id')->references('id')->on('order_parcel')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('envelop_id')->references('id')->on('order_envelop')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('faxing_id')->references('id')->on('order_faxing')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('printing_id')->references('id')->on('order_printing')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('scanning_id')->references('id')->on('order_scanning')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('agent_id')->references('id')->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
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
        Schema::dropIfExists('transactions');
    }
}
