<?php


namespace App\Tests;

use App\Ecommerce\Cart;
use App\Ecommerce\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function get_products()
    {
        return [
            'a list of product with a total < 100' => [
                [
                    new Product('Product 1', (float) 12),
                    new Product('Product 2', (float) 12),
                    new Product('Product 3', (float) 12),
                ],
                51.5,
            ],
            'a list of product with a total == 100' => [
                [
                    new Product('Product 1', (float) 33),
                    new Product('Product 2', (float) 33),
                    new Product('Product 3', (float) 34),
                ],
                (float) 115,
            ],
            'a list of product with a total > 100' => [
                [
                    new Product('Product 1', (float) 100),
                    new Product('Product 2', (float) 12),
                    new Product('Product 3', (float) 12),
                ],
                (float) 134,
            ],
        ];
    }

//    /**
//     * @testdox getProductCartPrice return a price as float for products with
//     * @dataProvider get_products
//     */
//    public function get_product_cart_price_with_products($products, $total)
//    {
//        $cart = new Cart($products);
//
//        $this->assertSame($total, $cart->getProductCartPrice());
//        $this->assertSame($total, $cart->getProductCartPrice());
//    }
}
