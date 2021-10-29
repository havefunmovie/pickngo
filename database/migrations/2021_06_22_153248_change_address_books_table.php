<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAddressBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('address_books', function (Blueprint $table) {
            $table->string('trans_type', 11)->comment('Residential|Business');
            $table->string('phone', 20);
            $table->string('email');
            $table->string('service_type')->comment('Parcel|Envelop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('address_books', function (Blueprint $table) {
            $table->unsignedInteger('country')->change();
            $table->unsignedInteger('province')->change();
            $table->unsignedInteger('city')->change();
        });
    }
}
