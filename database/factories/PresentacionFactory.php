<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Presentacion::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->name,
        'abreviatura' => strtoupper($faker->word),
    ];
});
