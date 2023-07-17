<?php

namespace App\Models\Shop\ProductImages;

use Andresgarzonj\Baserepo\BaseRepository;
use App\Models\Shop\Products\Product;

class ProductImageRepository extends BaseRepository
{
    /**
     * ProductImageRepository constructor.
     * @param ProductImage $productImage
     */
    public function __construct(ProductImage $productImage)
    {
        parent::__construct($productImage);
        $this->model = $productImage;
    }

    /**
     * @return mixed
     */
    public function findProduct() : Product
    {
        return $this->model->product;
    }
}
