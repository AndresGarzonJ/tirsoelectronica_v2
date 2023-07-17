<?php

namespace App\Models\Shop\States\Repositories;

use Andresgarzonj\Baserepo\BaseRepository;
use App\Models\Shop\Cities\City;
use App\Models\Shop\Cities\Repositories\CityRepository;
use App\Models\Shop\States\State;
use Illuminate\Support\Collection;

class StateRepository extends BaseRepository implements StateRepositoryInterface
{
    /**
     * StateRepository constructor.
     *
     * @param State $state
     */
    public function __construct(State $state)
    {
        parent::__construct($state);
        $this->model = $state;
    }

    /**
     * @return Collection
     */
    public function listCities(): Collection
    {
        $cityRepo = new CityRepository(new City);
        return $cityRepo->listCitiesByStateCode($this->model->state_code);
    }
}