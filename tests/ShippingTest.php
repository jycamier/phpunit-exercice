<?php

namespace App\Tests;

use App\Ecommerce\Shipping;
use PHPUnit\Framework\TestCase;

class ShippingTest extends TestCase
{
    /**
     * @testdox Shipping for an amount less than 100 is 15.5
     */
    public function total_is_less_than_100()
    {
        $shipping = new Shipping();
        $this->assertSame(15.5, $shipping->getShippingPrice((float) 99));
    }

    /**
     * @testdox Shipping for an amount equals to 100 is 15.0
     */
    public function total_is_equals_to_100()
    {
        $shipping = new Shipping();
        $this->assertSame(15.0, $shipping->getShippingPrice((float) 100));
    }

    /**
     * @testdox Shipping for an greater less than 100 is 10
     */
    public function total_is_greater_than_100()
    {
        $shipping = new Shipping();
        $this->assertSame((float) 10, $shipping->getShippingPrice(100.1));
    }
}
