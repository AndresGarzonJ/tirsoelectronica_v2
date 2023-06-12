<?php

namespace App\Models\Shop\Orders\Transformers;

use App\Models\Shop\Addresses\Address;
use App\Models\Shop\Addresses\Repositories\AddressRepository;
use App\Models\Shop\Couriers\Courier;
use App\Models\Shop\Couriers\Repositories\CourierRepository;
use App\Models\Shop\Customers\Customer;
use App\Models\Shop\Customers\Repositories\CustomerRepository;
use App\Models\Shop\Orders\Order;
use App\Models\Shop\OrderStatuses\OrderStatus;
use App\Models\Shop\OrderStatuses\Repositories\OrderStatusRepository;

trait OrderTransformable
{
    /**
     * Transform the order
     *
     * @param Order $order
     * @return Order
     */
    protected function transformOrder(Order $order) : Order
    {
        $courierRepo = new CourierRepository(new Courier());
        $order->courier = $courierRepo->findCourierById($order->courier_id);

        $customerRepo = new CustomerRepository(new Customer());
        $order->customer = $customerRepo->findCustomerById($order->customer_id);

        $addressRepo = new AddressRepository(new Address());
        $order->address = $addressRepo->findAddressById($order->address_id);

        $orderStatusRepo = new OrderStatusRepository(new OrderStatus());
        $order->status = $orderStatusRepo->findOrderStatusById($order->order_status_id);

        return $order;
    }
}
