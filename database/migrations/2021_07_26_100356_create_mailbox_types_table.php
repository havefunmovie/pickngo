<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailBoxTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailbox_types', function (Blueprint $table) {
            $table->id();
            $table->string('box_type')->comment('small, normal, large');
            $table->decimal('price', 5, 2);
            $table->string('expired_time', 2)->comment('1|2|3...');
            $table->string('expired_type', 6)->comment('months|year');

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
        Schema::dropIfExists('mailbox_types');
    }
}
