<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMainDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            
            $table->bigInteger('dish_id')->unsigned()->nullable();
            $table->foreign('dish_id')->references('id')->on('slide_menus')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('main_dishes');
    }
}
