<?php

namespace App\Ecommerce;

class Product implements ProductInterface
{
    /** @var string */
    private $name;

    /** @var float */
    private $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
