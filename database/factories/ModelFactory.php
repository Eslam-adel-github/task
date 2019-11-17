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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});
$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'info' => $faker->sentence,
         'user_id'=>$faker->numberBetween($min=1, $max=10),
          'book_id'=>$faker->numberBetween($min=1,$max=5),
    ];
});
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});
/*name	auther	info	image	category_id	user_id	created_at	updated_at*/
$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'auther'=>$faker->name,
        'info'=>$faker->sentence,
        'image'=>$faker->imageUrl($width=200,$heigt=150),
        'category_id'=>$faker->numberBetween($min=0,$max=10),
        'user_id'=>$faker->numberBetween($min=0,$max=10),
    ];
});