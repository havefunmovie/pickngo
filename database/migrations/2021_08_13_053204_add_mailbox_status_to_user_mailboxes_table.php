<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMailboxStatusToUserMailboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_mailboxes', function (Blueprint $table) {
            $table->string('mailbox_status', 10)->nullable()->comment('suspended, terminated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_mailboxes', function (Blueprint $table) {
            //
        });
    }
}
