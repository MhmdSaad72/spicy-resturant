<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availabilities', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->integer('start_day')->default(1);
            $table->integer('end_day')->default(1);
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            // $table->dateTime('start_date')->nullable();
            // $table->dateTime('end_date')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('availabilities');
    }
}
