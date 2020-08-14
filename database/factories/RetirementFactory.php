<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Retirement;
use Faker\Generator as Faker;

$factory->define(Retirement::class, function (Faker $faker) use ($factory) {
    return [
        'rcode'=>$faker->unique()->numberBetween($min = 200 ,$max = 300,$strict=true),
        'icode' => $factory->create(App\Imprest::class)->icode,

    ];
});
