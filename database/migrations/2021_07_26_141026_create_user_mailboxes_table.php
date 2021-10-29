<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMailboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_mailboxes', function (Blueprint $table) {
            $table->id();
            $table->string('customer_1', 100);
            $table->string('customer_2', 100)->nullable();
            $table->string('customer_3', 100)->nullable();
            $table->string('renewal_date', 20);
            $table->string('mailbox_type', 20)->comment('personal, personal_plus, business, corporation');

            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('box_id')->index();
            $table->unsignedBigInteger('mailbox_type_id')->index();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('box_id')->references('id')->on('mailboxes')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mailbox_type_id')->references('id')->on('mailbox_types')
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
        Schema::dropIfExists('user_mailboxes');
    }
}
