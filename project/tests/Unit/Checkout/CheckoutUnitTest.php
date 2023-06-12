<?php

namespace Test\Unit\Checkout;

use App\Models\Shop\Carts\Repositories\CartRepository;
use App\Models\Shop\Carts\ShoppingCart;
use App\Models\Shop\Checkout\CheckoutRepository;
use App\Models\Shop\Orders\Order;
use App\Models\Shop\Orders\Repositories\OrderRepository;
use App\Models\Shop\OrderStatuses\OrderStatus;
use Tests\TestCase;

class CheckoutUnitTest extends TestCase
{
    /** @test */
    public function it_can_prepare_the_checkout_items()
    {
        $orderStatus = factory(OrderStatus::class)->create();

        $data = [
            'reference' => $this->product->sku,
            'courier_id' => $this->courier->id,
            'customer_id' => $this->customer->id,
            'address_id' => $this->address->id,
            'order_status_id' => $orderStatus->id,
            'payment' => 'paypal',
            'discounts' => 1.25,
            'total_products' => 120.50,
            'total' => 119.25,
            'total_paid' => 119.25,
            'tax' => 0
        ];

        $cartRepo = new CartRepository(new ShoppingCart);
        $qty = 1;
        $cartRepo->addToCart($this->product, $qty);
        $cartRepo->saveCart($this->customer);

        $checkoutRepo = new CheckoutRepository;
        $checkoutRepo->buildCheckoutItems($data);

        $orderRepo = new OrderRepository(new Order);
        $orders = $orderRepo->listOrders();

        $orders->each(function (Order $order) use ($data) {
            $this->assertEquals($data['reference'], $order->reference);
        });
    }
}
