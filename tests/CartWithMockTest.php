<?php

namespace App\Tests;

use App\Ecommerce\Cart;
use App\Ecommerce\ProductInterface;
use App\Ecommerce\ShippingInterface;
use App\Tools\MathFactoryInterface;
use App\Tools\MathInterface;
use PHPUnit\Framework\TestCase;

class CartWithMockTest extends TestCase
{

    public function get_products()
    {
        return [
            'a list of product with a total < 100' => [
                [
                    $this->getProductInterfaceStub((float) 12),
                    $this->getProductInterfaceStub((float) 12),
                    $this->getProductInterfaceStub((float) 12),
                ],
                $this->getShippingStub(15.5),
                36.0,
                51.5,
            ],
            'a list of product with a total == 100' => [
                [
                    $this->getProductInterfaceStub((float) 33),
                    $this->getProductInterfaceStub((float) 33),
                    $this->getProductInterfaceStub((float) 34),
                ],
                $this->getShippingStub(15.0),
                100.0,
                (float) 115,
            ],
            'a list of product with a total > 100' => [
                [
                    $this->getProductInterfaceStub((float) 100),
                    $this->getProductInterfaceStub((float) 12),
                    $this->getProductInterfaceStub((float) 12),
                ],
                $this->getShippingStub(10.0),
                124.0,
                (float) 134,
            ],
        ];
    }


    /**
     * @testdox getProductCartPrice return a price as float for stubed products with
     * @dataProvider get_products
     */
    public function get_product_cart_price_with_products($products, $shippingStubed, $priceWithoutShippingRates, $total)
    {
        $math = $this->createMock(MathInterface::class);
        $math
            ->expects($this->any())
            ->method('sum')
            ->willReturnSelf();
        $math
            ->expects($this->any())
            ->method('getNumber')
            ->willReturn($priceWithoutShippingRates);

        $mathFactoryMock = $this->createMock(MathFactoryInterface::class);
        $mathFactoryMock
            ->expects($this->any())
            ->method('getInstance')
            ->willReturnReference($math);

        $cart = new Cart($products, $mathFactoryMock, $shippingStubed);
        $this->assertSame($total, $cart->getProductCartPrice());
        $this->assertSame($total, $cart->getProductCartPrice());
    }

    protected function getProductInterfaceStub(float $price)
    {
        $productStubed = $this->createMock(ProductInterface::class);

        $productStubed
            ->expects($this->any())
            ->method('getPrice')
            ->willReturn($price);

        return $productStubed;
    }

    protected function getShippingStub(float $shippingFee)
    {
        $shippingStubed = $this->createMock(ShippingInterface::class);
        $shippingStubed
            ->expects($this->any())
            ->method('getShippingPrice')
            ->willReturn($shippingFee);

        return $shippingStubed;
    }
}
