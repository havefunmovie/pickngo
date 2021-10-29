<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('start_transaction_id');
            $table->unsignedBigInteger('end_transaction_id');
            $table->string('invoice_number', 20);
            $table->unsignedBigInteger('agent_id')->index();
            $table->float('balance_value');
            $table->string('sent_msg_status', 1)->default('0');
            $table->string('seen_msg_status', 1)->default('0');
            $table->string('suspend_msg')->nullable();

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
        Schema::dropIfExists('invoices');
    }
}
