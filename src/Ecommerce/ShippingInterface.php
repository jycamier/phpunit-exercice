<?php


namespace App\Ecommerce;

interface ShippingInterface
{
    public function getShippingPrice(float $price): float;
}
