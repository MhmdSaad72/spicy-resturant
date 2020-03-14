<?php

use Illuminate\Database\Seeder;

class DishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
        'name' => ['pizza' , 'pasta'],
        'title' => ['Pizzas dishes' , 'Pastas dishes'],
        'description' => ['try our pizza' , 'try our pasta'],
      ];

      $tags = ['pizza' , 'pasta'];

      for ($i=0; $i <2 ; $i++) {

        \App\Category::create([
          'name' => $categories['name'][$i] ,
          'title' => $categories['title'][$i] ,
          'description' => $categories['description'][$i],
        ]);

        \App\Tag::create([
          'name' => $tags[$i] ,
        ]);
      }

    }
}
