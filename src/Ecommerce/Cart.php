<?php

namespace App\Ecommerce;

use App\Tools\Math;

class Cart implements CartInterface
{
    /** @var ProductInterface[] */
    private $products;

    /** @var ShippingInterface[] */
    private $shipping;

    public function __construct(array $products)
    {
        $this->products = $products;
        $this->shipping = new Shipping();
    }

    public function getProductCartPrice(): float
    {
        $math = new Math();
        foreach ($this->products as $product) {
            $math->sum($product->getPrice());
        }

        return $this->shipping->getShippingPrice($math->getNumber()) + $math->getNumber();
    }
}
