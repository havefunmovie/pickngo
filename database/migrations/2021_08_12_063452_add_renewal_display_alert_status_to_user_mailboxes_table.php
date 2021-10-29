<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRenewalDisplayAlertStatusToUserMailboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_mailboxes', function (Blueprint $table) {
            $table->string('renewal_alert_status', 1)->default(0);
            $table->string('prevent_display_alert_status', 1)->default(0);
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
