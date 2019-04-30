<?php

namespace App\Tools;

class Math implements MathInterface
{
    public const ROUND_PRECISION = 2;

    /** @var float */
    protected $number;

    public function __construct()
    {
        $this->number = (float)0;
    }

    public function getNumber(): float
    {
        return $this->number;
    }

    public function sum(float $nbr): MathInterface
    {
        $this->number += $nbr;

        return $this;
    }

    public function substract(float $nbr): MathInterface
    {
        $this->number -= $nbr;

        return $this;
    }

    public function divide(float $nbr): MathInterface
    {
        if ($nbr === (float) 0) {
            throw new DivideByZeroException('Division by zero');
        }

        $this->number = round($this->number / $nbr, static::ROUND_PRECISION);

        return $this;
    }

    public function multiply(float $nbr): MathInterface
    {
        $this->number *= $nbr;

        return $this;
    }
}
