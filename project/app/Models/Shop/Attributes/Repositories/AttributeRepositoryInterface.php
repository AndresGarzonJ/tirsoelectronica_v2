<?php

namespace App\Models\Shop\Attributes\Repositories;

use App\Models\Shop\Attributes\Attribute;
use App\Models\Shop\AttributeValues\AttributeValue;
use Jsdecena\Baserepo\BaseRepositoryInterface;
use Illuminate\Support\Collection;

interface AttributeRepositoryInterface extends BaseRepositoryInterface
{
    public function createAttribute(array $data) : Attribute;

    public function findAttributeById(int $id) : Attribute;

    public function updateAttribute(array $data) : bool;

    public function deleteAttribute() : ?bool;

    public function listAttributes($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc') : Collection;

    public function listAttributeValues() : Collection;

    public function associateAttributeValue(AttributeValue $attributeValue) : AttributeValue;
}
