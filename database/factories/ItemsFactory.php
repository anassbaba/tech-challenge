<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Item;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Item::class, function (Faker $faker) {
    return [
        'image' => 'https://picsum.photos/id/'.$faker->numberBetween(100,999).'/600/150?',
        'title' => $faker->realText($maxNbChars = 60, $indexSize = 2),
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
