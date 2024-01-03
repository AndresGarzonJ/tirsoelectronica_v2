<?php
namespace Database\Seeders;
use App\Models\Blogs\Blog;
use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Blog::class)->create();
    }
}