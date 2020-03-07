<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'title' => 'title',
        'description' => 'description',
        'price' => 7.25 ,
        'content' => 'content' ,
        'category_id' => $faker->random(1 , 4),
    ];
});
