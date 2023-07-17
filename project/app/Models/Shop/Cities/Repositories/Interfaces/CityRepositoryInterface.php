<?php

namespace App\Models\Shop\Cities\Repositories\Interfaces;

use Andresgarzonj\Baserepo\BaseRepositoryInterface;
use App\Models\Shop\Cities\City;

interface CityRepositoryInterface extends BaseRepositoryInterface
{
    public function listCities();

    public function findCityById(int $id) : City;

    public function updateCity(array $params) : bool;

    public function findCityByName(string $name) : City;
}
