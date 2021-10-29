<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShippingFieldsToParcelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_parcel', function (Blueprint $table) {
            $table->string('tracking_code_1', 6)->after('tracking_code');
            $table->string('desc_of_content')->after('email_to')->nullable();
            $table->string('unit', 10)->nullable();
            $table->decimal('value_of_content', 10, 2)->nullable();
            $table->decimal('insurance', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_parcel', function (Blueprint $table) {
            //
        });
    }
}
