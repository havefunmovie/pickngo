<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('address_books'))
            return;

        Schema::create('address_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('type', 50)->default('from');
//            $table->foreign('user_id')->references('user_id')->on('users')
//                ->onDelete('cascade')->onUpdate('cascade');
            $table->string('country', 2)->nullable();
            $table->string('province', 2)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('name', 100);
            $table->text('line_1');
            $table->text('line_2');
            $table->string('attention')->nullable();
            $table->string('instruction')->nullable();
            $table->string('postal_code')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('address_book');
    }
}
