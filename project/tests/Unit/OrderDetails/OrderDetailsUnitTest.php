<?php

namespace Tests\Unit\OrderDetails;

use App\Models\Shop\Carts\Repositories\CartRepository;
use App\Models\Shop\Carts\ShoppingCart;
use App\Models\Shop\Orders\Order;
use App\Models\Shop\Orders\Repositories\OrderRepository;
use App\Models\Shop\Products\Product;
use Tests\TestCase;

class OrderDetailsUnitTest extends TestCase
{
    /** @test */
    public function it_can_build_the_order_details()
    {
        $cartRepo = new CartRepository(new ShoppingCart);
        $qty = 1;
        $cartRepo->addToCart($this->product, $qty);
        $cartRepo->saveCart($this->customer);

        $order = factory(Order::class)->create();

        $orderRepo = new OrderRepository($order);
        $orderRepo->buildOrderDetails($cartRepo->getCartItems());
        $products = $orderRepo->listOrderedProducts();

        $products->each(function (Product $product) {
            $this->assertEquals($this->product->name, $product->name);
            $this->assertEquals($this->product->sku, $product->sku);
            $this->assertEquals($this->product->slug, $product->slug);
            $this->assertEquals($this->product->description, $product->description);
            $this->assertEquals($this->product->cover, $product->cover);
            $this->assertEquals($this->product->price, $product->price);
            $this->assertEquals($this->product->status, $product->status);
        });
    }
}
