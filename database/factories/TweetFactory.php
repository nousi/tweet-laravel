<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Tweet;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    $userIDs  = App\User::pluck('id')->all();
    return [
        //
        'title' => $faker->realText(30),
        'text' => $faker->realText(200),
        'user_id' => $faker->randomElement($userIDs),
    ];
});
