<?php

namespace App\Models\Shop\Customers\Repositories\Interfaces;

use App\Models\Shop\Addresses\Address;
use Andresgarzonj\Baserepo\BaseRepositoryInterface;
use App\Models\Shop\Customers\Customer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as Support;

interface CustomerRepositoryInterface extends BaseRepositoryInterface
{
    public function listCustomers(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Support;

    public function createCustomer(array $params) : Customer;

    public function updateCustomer(array $params) : bool;

    public function findCustomerById(int $id) : Customer;

    public function deleteCustomer() : bool;

    public function attachAddress(Address $address) : Address;

    public function findAddresses() : Support;

    public function findOrders() : Collection;

    public function searchCustomer(string $text) : Collection;

    public function charge(int $amount, array $options);
}
