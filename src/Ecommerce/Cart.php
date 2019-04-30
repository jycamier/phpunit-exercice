<?php

namespace App\Ecommerce;

use App\Tools\MathFactoryInterface;

class Cart implements CartInterface
{
    /** @var ProductInterface[] */
    private $products;

    /** @var ShippingInterface[] */
    private $shipping;

    /** @var MathFactoryInterface  */
    private $mathFactory;

    public function __construct(array $products, MathFactoryInterface $mathFactory, ShippingInterface $shipping)
    {
        $this->products = $products;
        $this->mathFactory = $mathFactory;
        $this->shipping = $shipping;
    }

    public function getProductCartPrice(): float
    {
        $math = $this->mathFactory->getInstance();
        foreach ($this->products as $product) {
            $math->sum($product->getPrice());
        }

        return $this->shipping->getShippingPrice($math->getNumber()) + $math->getNumber();
    }
}
