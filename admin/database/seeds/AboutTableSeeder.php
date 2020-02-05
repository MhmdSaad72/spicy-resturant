<?php

use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\AboutU::create([
        'title' => 'Food service',
        'description' => 'Welcome to our restaurant',
        'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
       ]);

       App\Statistic::create([
         'title' => 'Food service',
         'image' => 'uploads/dish.png',
         'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
        ]);

        App\AboutService::create([
          'title' => 'Food service',
          'image' => 'uploads/dish.png',
          'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
          'icon' => 'uploads/dish.png',
         ]);

         App\Philosophy::create([
           'title' => 'Food service',
           'description' => 'Welcome to our restaurant',
           'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
           'name' => 'Name',
           'position' => 'ceo',
          ]);
    }
}
