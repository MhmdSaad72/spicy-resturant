<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Statistic;
use Faker\Generator as Faker;

$factory->define(Statistic::class, function (Faker $faker) {
    return [
      'title' => 'Food service',
      'image' => 'uploads/dish.png',
      'count' => 12,
    ];
});
