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
        'image' => 'uploads/dish.png',
       ]);
      App\MainDish::create([
        'title' => 'Today\'s main dish',
        'description' => 'Vegetable omelete',
        'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
        'image' => 'uploads/plate.png',
       ]);
        App\OurStory::create([
          'title' => 'Our story',
          'description' => 'About our restaurant',
          'content' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.',
         ]);
        App\Availability::create([
          'title' => 'Our story',
          'description' => 'About our restaurant',
          'start_date' => \Carbon\Carbon::now(),
          'end_date' => \Carbon\Carbon::now()->addWeek(),
         ]);
        App\OurServicesHead::create([
          'title' => 'Our services',
          'description' => 'All your needs in one place',
         ]);
         App\OurServicesBody::create([
           'title' => 'Awesome Drinks',
           'content' => 'Lorem ipsum dolor sit amet, consetur adipisicing',
           'image' => 'uploads/coffee-default.svg'
          ]);
        App\FeaturDishHead::create([
          'title' => 'Featured dishes',
          'description' => 'Our Featured Dishes',
         ]);
       App\FeatureDishBody::create([
         'title' => 'Featured dishes',
         'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
         'price' => 7,
         'image' => 'uploads/dish-2.png',

        ]);



    }
}
