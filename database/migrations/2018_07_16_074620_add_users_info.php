<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id',true)->change();
            $table->unsignedInteger('agent_id')->after('id')->nullable();
            $table->string('family')->after('name')->nullable();
            $table->string('username', 100)->after('email')->unique()->nullable();
            $table->string('mobile', 20)->after('username')->unique()->nullable();
            $table->string('type', 50)->after('mobile')->nullable();

            $table->char('gender', 1)->after('type')->comment('1=>male|2=>female')->nullable();
            $table->date('birthday')->after('gender')->nullable();
            $table->timestamp('mobile_verified_at')->after('birthday')->nullable();
            $table->timestamp('last_login_at')->after('mobile_verified_at')->nullable();
            $table->timestamp('deleted_at')->after('updated_at')->nullable();
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
            $table->dropColumn('family', 'username','level','mobile','type','gender','birthday','mobile_verified_at','last_login_at','deleted_at');
        });
    }
}
