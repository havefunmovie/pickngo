<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminConfStatusToUserMailboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_mailboxes', function (Blueprint $table) {
            $table->string('confirm_status', 1)->default(0)->comment('1:confirmed, 0:new request, 2:not confirmed');
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
