<?php

namespace App\Models\Shop\States\Repositories;

use Andresgarzonj\Baserepo\BaseRepositoryInterface;
use Illuminate\Support\Collection;

interface StateRepositoryInterface extends BaseRepositoryInterface
{
    public function listCities() : Collection;
}