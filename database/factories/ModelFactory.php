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

$factory->define(CodeEduUser\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'verified' => true
    ];
});

$factory->define(\CodeEduBook\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => ucfirst($faker->unique()->word)
    ];
});
    
$factory->define(\CodeEduBook\Models\Book::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'title' => ucfirst($faker->unique()->word),
        'subtitle' => $faker->name,
        'price' => $faker->numberBetween(10,200)
    ];
});