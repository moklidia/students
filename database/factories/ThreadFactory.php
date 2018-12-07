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


$factory->define(
    App\Models\Thread::class,
    function (Faker $faker) {
        return [
        /*'user_id' => \App\Models\User::pluck('id')->random(),*/
        'user_id' => function () {
            return factory('App\Models\User')->create()->id;
        },
        /*if (app()->environment() === 'testing') {
            throw $exception;
        }*/
        'channel_id' => function () {
            return factory('App\Models\Channel')->create()->id;
        },
        'title' => $faker->sentence,
        'body' => $faker->paragraph
        ];
    }
);