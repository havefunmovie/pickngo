<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgentInfoToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('def_pass')->nullable();
            $table->string('def_pass_status', 1)->nullable();
            $table->string('web_link')->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('tps')->nullable();
            $table->string('tvq')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('def_pass');
            $table->dropColumn('def_pass_status');
            $table->dropColumn('web_link');
            $table->dropColumn('fax');
        });
    }
}
