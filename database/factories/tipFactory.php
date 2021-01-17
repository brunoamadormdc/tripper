<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tip;
use Faker\Generator as Faker;

$factory->define(Tip::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'body' => $faker->word,
        'image' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
