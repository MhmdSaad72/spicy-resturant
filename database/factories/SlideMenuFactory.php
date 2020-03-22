<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SlideMenu;
use Faker\Generator as Faker;

$factory->define(SlideMenu::class, function (Faker $faker) {
    return [
      'title' => 'Food service',
      'price' => 7.25,
      // 'description' => 'Welcome to our restaurant',
      'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
      'weight' => 1 ,
      'calories' => 450 ,
      'sku' => 'CN50',
      'category_id' => $faker->numberBetween(1 ,2),
      'tag_id' => $faker->numberBetween(1 ,2),
      'more_content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
    ];
});
