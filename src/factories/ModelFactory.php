<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\Blog\User::class, function (Faker\Generator $faker) {
    static $password;
    static $gender;

    return [
        'first_name' => $faker->firstName,
        'gender' => $faker->text,
        'last_name' => $faker->lastName,
        'username' => $faker->unique()->username,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'phone_number' => $faker->phoneNumber,
        'remember_token' => str_random(10),
    ];
});
$factory->define(\Blog\Role::class, function (Faker\Generator $faker) {
    

    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'remember_token' => str_random(10),
    ];
});
$factory->define(\Blog\UserRole::class, function (Faker\Generator $faker) {
    

    return [
        'user_id' => $faker->numberBetween($min = 1, $max=10),
        'role_id' => $faker->numberBetween($min = 1, $max=10),
        'remember_token' => str_random(10),
    ];
});
$factory->define(\Blog\Term::class, function (Faker\Generator $faker) {
    

    return [
        'name' => $faker->name,
        'slug' => $faker->unique()->slug,
        'term_description' => $faker->text,
        'parent_id' => null,
        'user_id' => $faker->numberBetween($min = 1, $max=10),
        'remember_token' => str_random(10),
    ];
});
$factory->define(\Blog\Post::class, function (Faker\Generator $faker) {
    

    return [
        'title' => $faker->title,
        'content' => $faker->text,
        'slug' => $faker->unique()->slug,
        'user_id' => $faker->numberBetween($min = 1, $max=10),
        'term_id' => $faker->numberBetween($min = 1, $max=10),
        'remember_token' => str_random(10),
    ];
});
$factory->define(\Blog\Comment::class, function (Faker\Generator $faker) {
    

    return [
        'comment_content' => $faker->text,
        'user_id' => $faker->numberBetween($min = 1, $max=10),
        'post_id' => $faker->numberBetween($min = 1, $max=10),
        'parent_id' => null,
        'remember_token' => str_random(10),
    ];
});
