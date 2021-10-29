<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderEnvelopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_envelop', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('agent_id')->index();

            $table->string('tracking_code', 18)->unique();
            $table->string('label', 22);
            $table->string('weight');
            $table->string('weight_type');
            $table->string('service_code');
            $table->string('service_name');

            $table->string('country_from');
            $table->string('province_from');
            $table->string('city_from');
            $table->string('name_from');
            $table->text('line_1_from');
            $table->text('line_2_from')->nullable();
            $table->string('attention_from');
            $table->string('instruction_from')->nullable();
            $table->string('postal_code_from');
            $table->string('trans_type_from', 11)->comment('Residential|Business');
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
            $table->string('trans_type_to', 11)->comment('Residential|Business');
            $table->string('phone_to');
            $table->string('email_to');

            
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('order_envelop');
    }
}
