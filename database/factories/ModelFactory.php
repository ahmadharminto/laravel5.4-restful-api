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
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'verified' => $verified = $faker->randomElement([App\Models\User::VERIFIED_USER, App\Models\User::UNVERIFIED_USER]),
     	'verification_token' => $verified = App\Models\User::VERIFIED_USER ? null : App\Models\User::generateVerificationCode(),
     	'admin' => $verified = $faker->randomElement([App\Models\User::ADMIN_USER, App\Models\User::REGULAR_USER]),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'quantity' => $faker->numberBetween(1, 10),
        'status' => $faker->randomElement([App\Models\Product::AVAILABLE_PRODUCT, App\Models\Product::UNAVAILABLE_PRODUCT]),
		'image' => $faker->randomElement(['1.jpg', '2.jpg', '3.jpg']),
		'seller_id' => App\Models\User::all()->random()->id,
		// App\Models\User::inRandomOrder()->first()->id        
    ];
});

$factory->define(App\Models\Transaction::class, function (Faker\Generator $faker) {

	$seller = App\Models\Seller::has('products')->get()->random();
	$buyer = App\Models\User::all()->except($seller->id)->random();

    return [
        'quantity' => $faker->numberBetween(1, 10),
        'buyer_id' => $buyer->id,
        'product_id' => $seller->products->random()->id,
        // App\Models\User::inRandomOrder()->first()->id        
    ];
});

