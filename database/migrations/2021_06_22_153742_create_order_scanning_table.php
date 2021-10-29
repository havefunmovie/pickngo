<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderScanningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_scanning', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_code');
            $table->string('email');
            $table->string('paper_count');
            $table->string('agent_accept_status')->comment('Accept|Reject')->nullable();
            $table->text('reject_reason_message')->nullable();
            $table->unsignedBigInteger('agent_id')->index();
            $table->unsignedBigInteger('user_id')->index();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('order_scanning');
    }
}
