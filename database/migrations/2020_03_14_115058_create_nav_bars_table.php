<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNavBarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nav_bars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('home')->nullable();
            $table->string('about')->nullable();
            $table->string('about_1')->nullable();
            $table->string('about_2')->nullable();
            $table->string('contact')->nullable();
            $table->string('contact_1')->nullable();
            $table->string('contact_2')->nullable();
            $table->string('menu')->nullable();
            $table->string('menu_1')->nullable();
            $table->string('menu_2')->nullable();
            $table->string('pages')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nav_bars');
    }
}
