<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BranchBody;
use Faker\Generator as Faker;

$factory->define(BranchBody::class, function (Faker $faker) {
    return [
        'place' => 'Brooklin',
        'address' => 'St Johns Nostrand, Brooklyn',
        'phone' => 21457853,
        'email' => 'Brooklyn@spicy.com',
    ];
});
