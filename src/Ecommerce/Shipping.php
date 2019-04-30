<?php


namespace App\Ecommerce;

class Shipping implements ShippingInterface
{
    public const  SHIPPING_RATES_MINUS = 10.0;
    public const  SHIPPING_RATES_MEDIAN = 15.0;
    public const  SHIPPING_RATES_MAX = 15.5;

    public function getShippingPrice(float $price): float
    {
        if ($price < (float)100) {
            return static::SHIPPING_RATES_MAX;
        }

        if ($price === (float)100) {
            return static::SHIPPING_RATES_MEDIAN;

        }

        return static::SHIPPING_RATES_MINUS;
    }
}
