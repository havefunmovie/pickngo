<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPrintingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_printing', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_code');
            $table->string('paper_type')->comment('A3|A4|A5');
            $table->string('color_type')->comment('colorful|gery');
            $table->string('paper_count');
            $table->string('uploaded_file')/*->default('pro.jpg')*/;
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
        Schema::dropIfExists('order_printing');
    }
}
