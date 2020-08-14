<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Imprest;
use Faker\Generator as Faker;

$factory->define(Imprest::class, function (Faker $faker) { 
    return [
        'icode'=>$faker->numberBetween($min = 100, $max = 200,$strict=true),
        'purpose'=>$faker->realText($maxNbChars = 50, $indexSize = 2) ,
        'amount'=>$faker->numberBetween($min = 10000, $max = 20000),

    ];
    
});
