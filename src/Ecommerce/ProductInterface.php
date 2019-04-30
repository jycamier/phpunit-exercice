<?php


namespace App\Ecommerce;

interface ProductInterface
{
    public function getPrice(): float;
    public function getName(): string;
}
