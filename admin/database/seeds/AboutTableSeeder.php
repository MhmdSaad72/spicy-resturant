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


         App\Philosophy::create([
           'title' => 'Food service',
           'description' => 'Welcome to our restaurant',
           'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
           'name' => 'Name',
           'position' => 'ceo',
          ]);

          App\Award::create([
            'description' => 'Welcome to our restaurant',
            'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
            'year' => '2019-2-3',
         ]);
         
         App\MasterChef::create([
           'title' => 'Masters of cooking',
           'description' => 'Our master chefs',
         ])
    }
}
