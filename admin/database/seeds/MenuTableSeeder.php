<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\FoodMenu::create([
        'title' => 'Food service',
        'description' => 'Welcome to our restaurant',
        'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
       ]);

       App\MenuList::create([
         'title' => 'Food service',
         'description' => 'Welcome to our restaurant',
         'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
         'slide_id' => 1,
        ]);

        App\SlideMenu::create([
          'title' => 'Food service',
          'image' => 'uploads/dish.png',
          'price' => 7,
          'description' => 'Welcome to our restaurant',
          'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
          'slide_id' => 1,
         ]);
    }
}
