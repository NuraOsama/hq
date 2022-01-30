<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_phones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->string('message')->nullable();
            $table->string('request_id')->nullable();
            $table->string('is_read')->nullable();
            $table->integer('notifier_id')->unsigned();
            $table->foreign('notifier_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('notification_phones');
    }
}
