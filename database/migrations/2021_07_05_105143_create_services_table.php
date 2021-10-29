<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('color_type', 8)->nullable();
            $table->string('paper_type', 2)->nullable();
            $table->string('price_first_page')->nullable();
            $table->string('price_more_page')->nullable();
            $table->string('service_percentage', 2)->nullable();
            $table->string('driver_percentage', 2)->nullable();
            $table->string('service_type');
            $table->string('service_price')->nullable();
            $table->string('urgent_price')->nullable();

            $table->string('weight_limit')->nullable();  //maximum weight customer can added
            $table->string('weight_minimum')->nullable(); // 0 - minimum weight get same price
            $table->string('weight_extra')->nullable();     // for each extra weight, extra price will added
            $table->string('weight_extra_price')->nullable();

            $table->string('dimensions_limit')->nullable();  //maximum weight customer can added
            $table->string('dimensions_minimum')->nullable(); // 0 - minimum weight get same price
            $table->string('dimensions_extra')->nullable();     // for each extra weight, extra price will added
            $table->string('dimensions_extra_price')->nullable();

            $table->string('distance_limit')->nullable();  //maximum weight customer can added
            $table->string('distance_minimum')->nullable(); // 0 - minimum weight get same price
            $table->string('distance_extra')->nullable();     // for each extra weight, extra price will added
            $table->string('distance_extra_price')->nullable();
            
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
        Schema::dropIfExists('services');
    }
}
