<?php

namespace App\Providers;

use App\Models\Shop\Addresses\Repositories\AddressRepository;
use App\Models\Shop\Addresses\Repositories\Interfaces\AddressRepositoryInterface;
use App\Models\Shop\Attributes\Repositories\AttributeRepository;
use App\Models\Shop\Attributes\Repositories\AttributeRepositoryInterface;
use App\Models\Shop\AttributeValues\Repositories\AttributeValueRepository;
use App\Models\Shop\AttributeValues\Repositories\AttributeValueRepositoryInterface;
use App\Models\Shop\Brands\Repositories\BrandRepository;
use App\Models\Shop\Brands\Repositories\BrandRepositoryInterface;
use App\Models\Shop\Carts\Repositories\CartRepository;
use App\Models\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Models\Shop\Categories\Repositories\CategoryRepository;
use App\Models\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Shop\Cities\Repositories\CityRepository;
use App\Models\Shop\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Models\Shop\Countries\Repositories\CountryRepository;
use App\Models\Shop\Countries\Repositories\Interfaces\CountryRepositoryInterface;
use App\Models\Shop\Couriers\Repositories\CourierRepository;
use App\Models\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Models\Shop\Customers\Repositories\CustomerRepository;
use App\Models\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Models\Shop\Employees\Repositories\EmployeeRepository;
use App\Models\Shop\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Models\Shop\Orders\Repositories\Interfaces\OrderRepositoryInterface;
use App\Models\Shop\Orders\Repositories\OrderRepository;
use App\Models\Shop\OrderStatuses\Repositories\Interfaces\OrderStatusRepositoryInterface;
use App\Models\Shop\OrderStatuses\Repositories\OrderStatusRepository;
use App\Models\Shop\Permissions\Repositories\PermissionRepository;
use App\Models\Shop\Permissions\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Models\Shop\ProductAttributes\Repositories\ProductAttributeRepository;
use App\Models\Shop\ProductAttributes\Repositories\ProductAttributeRepositoryInterface;
use App\Models\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Shop\Products\Repositories\ProductRepository;
use App\Models\Shop\Provinces\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Models\Shop\Provinces\Repositories\ProvinceRepository;
use App\Models\Shop\Roles\Repositories\RoleRepository;
use App\Models\Shop\Roles\Repositories\RoleRepositoryInterface;
use App\Models\Shop\Shipping\ShippingInterface;
use App\Models\Shop\Shipping\Shippo\ShippoShipmentRepository;
use App\Models\Shop\States\Repositories\StateRepository;
use App\Models\Shop\States\Repositories\StateRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Models\Contact\Repositories\Interfaces\ContactRepositoryInterface;
use App\Models\Contact\Repositories\ContactRepository; 

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            StateRepositoryInterface::class,
            StateRepository::class
        );

        $this->app->bind(
            ShippingInterface::class,
            ShippoShipmentRepository::class
        );

        $this->app->bind(
            BrandRepositoryInterface::class,
            BrandRepository::class
        );

        $this->app->bind(
            ProductAttributeRepositoryInterface::class,
            ProductAttributeRepository::class
        );

        $this->app->bind(
            AttributeValueRepositoryInterface::class,
            AttributeValueRepository::class
        );

        $this->app->bind(
            AttributeRepositoryInterface::class,
            AttributeRepository::class
        );

        $this->app->bind(
            EmployeeRepositoryInterface::class,
            EmployeeRepository::class
        );

        $this->app->bind(
            CustomerRepositoryInterface::class,
            CustomerRepository::class
        );

        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            AddressRepositoryInterface::class,
            AddressRepository::class
        );

        $this->app->bind(
            CountryRepositoryInterface::class,
            CountryRepository::class
        );

        $this->app->bind(
            ProvinceRepositoryInterface::class,
            ProvinceRepository::class
        );

        $this->app->bind(
            CityRepositoryInterface::class,
            CityRepository::class
        );

        $this->app->bind(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );

        $this->app->bind(
            OrderStatusRepositoryInterface::class,
            OrderStatusRepository::class
        );

        $this->app->bind(
            CourierRepositoryInterface::class,
            CourierRepository::class
        );

        $this->app->bind(
            CartRepositoryInterface::class,
            CartRepository::class
        );

        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );

        $this->app->bind(
            PermissionRepositoryInterface::class,
            PermissionRepository::class
        );
        $this->app->bind(
            ContactRepositoryInterface::class,
            ContactRepository::class
        );
    }
}
