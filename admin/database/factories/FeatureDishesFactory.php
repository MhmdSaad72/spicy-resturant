<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FeatureDishBody;
use Faker\Generator as Faker;

$factory->define(FeatureDishBody::class, function (Faker $faker) {
    return [
      'title' => 'Featured dishes',
      'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
      'price' => 7.25,
      'image' => 'uploads/dish-2.png',
    ];
});
