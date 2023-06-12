<?php

namespace App\Models\Shop\Shipping;

use App\Models\Shop\Addresses\Address;
use Illuminate\Support\Collection;

interface ShippingInterface
{
    public function setPickupAddress();

    public function setDeliveryAddress(Address $address);

    public function readyParcel(Collection $collection);

    public function getRates(string $shipmentObjId, string $currency = 'USD');

    public function readyShipment();
}