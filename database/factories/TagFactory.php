<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $tag = new Tag();
    return [
        'name' => $tag->uniqueTag($faker),
        'code' => $tag->uniqueTag($faker, true),
        'description' => $faker->paragraphs(rand(1, 4), true),
    ];
});


