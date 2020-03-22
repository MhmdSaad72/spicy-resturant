<?php

use Illuminate\Database\Seeder;

class HomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Service::create([
        'title' => 'Food service',
        'description' => 'Welcome to our restaurant',
        'address' => '32 Radwan El-Tayeb, Giza Governorate, Egypt',
        'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
       ]);
        App\OurStory::create([
          'title' => 'Our story',
          'description' => 'About our restaurant',
          'content' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.',
         ]);

    }
}
