<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //
        'body' => $faker->text,
        //colocamos del 1 al 5 por que creamos 5 usuarios en un principio
        'user_id'=>rand(1,5)
    ];
});
