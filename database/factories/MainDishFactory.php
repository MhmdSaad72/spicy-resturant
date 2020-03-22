<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MainDish;
use Faker\Generator as Faker;

$factory->define(MainDish::class, function (Faker $faker) {
    return [
        'dish_id' => 1 ,
    ];
});
