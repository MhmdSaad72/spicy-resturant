<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('smokingArea')->default(0);
            $table->integer('peopleNumber')->nullable();
            $table->integer('tablesNumber')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->text('specialrequest')->nullable();
            $table->string('booking_id')->nullable();
            $table->integer('cancelled')->default(0);

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bookings');
    }
}
