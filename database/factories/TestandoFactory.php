<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Testando;
use Faker\Generator as Faker;

$factory->define(Testando::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'body' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
