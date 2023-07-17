<?php

namespace App\Models\Shop\Countries\Repositories\Interfaces;

use Andresgarzonj\Baserepo\BaseRepositoryInterface;
use App\Models\Shop\Countries\Country;
use Illuminate\Support\Collection;

interface CountryRepositoryInterface extends BaseRepositoryInterface
{
    public function updateCountry(array $params) : Country;

    public function listCountries(string $order = 'id', string $sort = 'desc') : Collection;

    public function createCountry(array $params) : Country;

    public function findCountryById(int $id) : Country;

    public function findProvinces();

    public function listStates() : Collection;
}
