<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDropOffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drop_off', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('tracking_number');
            $table->enum('status', ['Pending','Pickup','Done'])->default('Pending');
            $table->string('company')->nullable();
            $table->text('note')->nullable();
            $table->string('prof_receipt')->nullable();

            $table->unsignedBigInteger('agent_id')->nullable();
            $table->foreign('agent_id')->references('id')->on('users')->constrained();

            $table->unsignedBigInteger('dropoff_agent_id')->nullable();
            $table->foreign('dropoff_agent_id')->references('id')->on('users')->constrained();

            $table->timestamp('send_at')->nullable();
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
        //
    }
}
