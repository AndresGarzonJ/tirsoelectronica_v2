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
use App\Models\Blogs\Blog;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

$factory->define(Blog::class, function (Faker\Generator $faker) {
    $blog = $faker->unique()->sentence;
    $file = UploadedFile::fake()->image('blog.png', 600, 600);

    return [
        'name' => $blog,
        'creator' => "Andres Garzon",
        'slug' => Str::slug($blog),
        'description' => $this->faker->paragraph,
        'description_short' => $this->faker->paragraph,
        'cover' => $file->getFilename() . '.'. $file->getClientOriginalExtension(),
        'url_video' => "https://www.youtube.com/embed/videoseries?list=PLQqX8aKGHZ3HdskDWHss9poPRecOOhjh0",
        'is_active' => true,
    ];
});
