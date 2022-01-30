<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('time')->nullable();
            $table->string('date')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->enum('type', ['home', 'lab']);
            $table->integer('test_id')->unsigned();
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('appointment_id')->unsigned()->nullable();
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
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
        Schema::dropIfExists('visits');
    }
}
