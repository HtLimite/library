<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Seat;
use Faker\Generator as Faker;

$factory->define(Seat::class, function (Faker $faker) {
    return [
        'name' => Str::random(20),
        'status' => $faker->randomElement($array = array('未使用','离开','已预约','使用中')),
    ];
});
