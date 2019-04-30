<?php

namespace App\Tools;

interface MathInterface
{
    public function getNumber(): float;
    public function sum(float $nbr): MathInterface;
    public function substract(float $nbr): MathInterface;
    public function divide(float $nbr): MathInterface;
    public function multiply(float $nbr): MathInterface;

}
