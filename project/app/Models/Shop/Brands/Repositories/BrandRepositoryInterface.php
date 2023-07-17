<?php

namespace App\Models\Shop\Brands\Repositories;

use Andresgarzonj\Baserepo\BaseRepositoryInterface;
use App\Models\Shop\Brands\Brand;
use App\Models\Shop\Products\Product;
use Illuminate\Support\Collection;

interface BrandRepositoryInterface extends BaseRepositoryInterface
{
    public function createBrand(array $data): Brand;

    public function findBrandById(int $id) : Brand;

    public function updateBrand(array $data) : bool;

    public function deleteBrand() : bool;

    public function listBrands($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc') : Collection;

    public function saveProduct(Product $product);
}
