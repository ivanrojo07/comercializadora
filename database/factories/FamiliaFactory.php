<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Familia::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->name,
        'abreviatura' => strtoupper($faker->word),
    ];
});
