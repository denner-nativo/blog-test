<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => 'Admin',
        'active' => true,
        
    ];
});
