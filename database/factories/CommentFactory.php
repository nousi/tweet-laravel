<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $tweetIDs  = App\Model\Tweet::pluck('id')->all();
    $userIDs  = App\User::pluck('id')->all();
    return [
        'text' => $faker->realText(30),
        'tweet_id' => $faker->randomElement($tweetIDs),
        'user_id' => $faker->randomElement($userIDs),
    ];
});
