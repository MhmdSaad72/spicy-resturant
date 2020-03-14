<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OurServicesBody;
use Faker\Generator as Faker;

$factory->define(OurServicesBody::class, function (Faker $faker) {
    return [
      'title' => 'Awesome Drinks',
      'content' => 'Lorem ipsum dolor sit amet, consetur adipisicing',
      // 'image' => 'uploads/coffee-default.svg'
    ];
});
