<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Comment::class, function (\Faker\Generator $faker){

	return [
        'username' => $faker->userName,
        'email' => $faker->email,
		'content'=> $faker->sentence,
		'ip' => $faker->ipv4,
	];
});

$factory->define(\App\Compterendu::class, function (\Faker\Generator $faker){

    return [
        'id_catégoriesports' => 'Aikido',
        'nomrencontre' => 'brocc lesnars vs bork laser',
        'datematch' => $faker->date,
        'lieu' => $faker->city,
        'typerencontre' => 'compétitif',
        'niveau' => 'international',
        'nomclub1' => $faker->company,
        'nomclub2' => $faker->company,

    ];
});