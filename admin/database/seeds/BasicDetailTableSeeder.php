<?php

use Illuminate\Database\Seeder;

class BasicDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\BasicDetail::create([
          'name' => 'Italiano',
          'logo' => 'logo',
          'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt',
          'hot_line' => 987098876,
          'footer_logo' => 'logo',
        ]);
        App\BasicReservation::create([
          'tables' => 10,
          'chairs' => 4,
        ]);
    }
}
