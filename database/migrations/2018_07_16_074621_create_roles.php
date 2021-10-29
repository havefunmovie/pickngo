<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('roles', function ( Blueprint $table ) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->text('label');
            # user operator
            $table->unsignedBigInteger('operator_id')->nullable();
            $table->foreign('operator_id')->references('id')
                ->on('users')->onDelete('set null')->onUpdate('cascade');
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
        //
    }
}
