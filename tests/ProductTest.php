<?php


namespace App\Tests;

use App\Ecommerce\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @testdox is initialize with a price as float
     */
    public function is_initialize_with_a_price()
    {
        $product = new Product('Produit 1', 12.1);

        $this->assertSame(12.10, $product->getPrice());
    }
    /**
     * @testdox is initialize with a name as string
     */
    public function is_initialize_with_a_name()
    {
        $product = new Product('Produit 1', 12.1);

        $this->assertSame('Produit 1', $product->getName());
    }
}
