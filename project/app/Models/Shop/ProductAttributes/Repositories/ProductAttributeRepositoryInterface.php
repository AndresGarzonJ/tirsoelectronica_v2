<?php

namespace App\Models\Shop\ProductAttributes\Repositories;

use Andresgarzonj\Baserepo\BaseRepositoryInterface;

interface ProductAttributeRepositoryInterface extends BaseRepositoryInterface
{
    public function findProductAttributeById(int $id);
}
