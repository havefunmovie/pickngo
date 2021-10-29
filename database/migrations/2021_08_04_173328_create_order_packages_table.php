<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders')->constrained();
            $table->foreignId('user_id')->references('id')->on('users')->constrained();
           
            $table->string('label')->nullable();
            $table->string('tracking_code')->unique()->nullable();
            $table->string('status');
            $table->integer('weight');
            $table->string('weight_type')->nullable();
            $table->integer('height');
            $table->integer('width');
            $table->integer('length');
            $table->string('dimension_type')->nullable();
            $table->string('description')->nullable();
            $table->string('service_type')->nullable();
            $table->string('service_cost')->nullable();
            $table->string('delivered_image')->nullable();

            $table->string('country_from');
            $table->string('province_from');
            $table->string('city_from');
            $table->string('name_from');
            $table->text('line_1_from');
            $table->text('line_2_from')->nullable();
            $table->string('attention_from');
            $table->string('instruction_from')->nullable();
            $table->string('postal_code_from');
            $table->string('trans_type_from')->comment('Residential|Business');
            $table->string('phone_from');
            $table->string('email_from');

            $table->string('country_to');
            $table->string('province_to');
            $table->string('city_to');
            $table->string('name_to');
            $table->text('line_1_to');
            $table->text('line_2_to')->nullable();
            $table->string('attention_to');
            $table->string('instruction_to')->nullable();
            $table->string('postal_code_to');
            $table->string('trans_type_to')->comment('Residential|Business');
            $table->string('phone_to');
            $table->string('email_to');
            
            // driver given time
            $table->dateTime('pickup_time')->nullable();
            $table->dateTime('deliver_time')->nullable();
            // driver real pickup and deliver time
            $table->dateTime('pickedup_at')->nullable();
            $table->dateTime('delivered_at')->nullable();

            $table->dateTime('accepted_at')->nullable();
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
        Schema::dropIfExists('order_package');
    }
}
