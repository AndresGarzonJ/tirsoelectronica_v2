<?php
namespace Database\Seeders;
use App\Models\Shop\Products\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Product::class)->create();
    }
}