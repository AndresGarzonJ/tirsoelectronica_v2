<?php
namespace Database\Seeders;
use App\Models\Shop\Categories\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Category::class)->create();
    }
}