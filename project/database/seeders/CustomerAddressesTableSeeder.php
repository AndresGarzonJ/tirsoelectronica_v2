<?php
namespace Database\Seeders;
use App\Models\Shop\Addresses\Address;
use App\Models\Shop\Customers\Customer;
use Illuminate\Database\Seeder;

class CustomerAddressesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Customer::class, 3)->create()->each(function ($customer) {
            factory(Address::class, 3)->make()->each(function($address) use ($customer) {
                $customer->addresses()->save($address);
            });
        });
    }
}