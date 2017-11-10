<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Personal::class, function (Faker $faker) {
    return [
        //
        'tipopersona' => $faker->randomElement(['Fisica','Moral']);
        'nombre' => $faker->firstName();
        'apellidopaterno'=>$faker->lastName();
        'apellidomaterno'=>$faker->lastName();
        'razonsocial'=>$faker->word();
        'alias'=>$faker->word();
        'rfc'=>$faker->vatId();
        'vendedor' => $faker->name();
        'calle'=>
    ];
});
