<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {


$image = $faker->image('public/storage/uploads',640,480, null, true);


    return [
        //'user_id' => Auth()->user()->id,
        'image' => str_replace('public/storage/','', $image),
        'caption' => $faker->sentence,
    ];
});
