<?php

namespace App\Tests;

use App\Tools\DivideByZeroException;
use App\Tools\Math;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    /**
     * @testdox is initialized with 0
     */
    public function is_initialize_with_zero()
    {
        $math = new Math();
        $this->assertSame((float) 0, $math->getNumber());
    }

    public function get_list_of_floats_with_result_for_sum()
    {
        return [
            'a list of positive floats' => [
                (float) 1,
                (float) 2,
                (float) 3,
                (float) 6,
            ],
            'a list of positive and negative floats' => [
                (float) 1,
                (float) 2,
                (float) -3,
                (float) 0,
            ],
        ];
    }

    /**
     * @testdox sum a list of floats with
     * @dataProvider get_list_of_floats_with_result_for_sum
     */
    public function sum_a_list_of_float($a, $b, $c, $result)
    {
        $math = new Math();
        $math
            ->sum($a)
            ->sum($b)
            ->sum($c);
        $this->assertSame($result, $math->getNumber());
    }



    public function get_list_of_floats_with_result_for_substract()
    {
        return [
            'a list of positive floats' => [
                (float) 1,
                (float) 2,
                (float) 3,
                (float) -6,
            ],
            'a list of positive and negative floats' => [
                (float) 1,
                (float) 2,
                (float) -3,
                (float) 0,
            ],
        ];
    }

    /**
     * @testdox substract a list of floats with
     * @dataProvider get_list_of_floats_with_result_for_substract
     */
    public function substract_a_list_of_float($a, $b, $c, $result)
    {
        $math = new Math();
        $math
            ->substract($a)
            ->substract($b)
            ->substract($c);
        $this->assertSame($result, $math->getNumber());
    }

    public function get_list_of_floats_with_result_for_multiply()
    {
        return [
            'a list of positive floats' => [
                (float) 1,
                (float) 2,
                (float) 3,
                (float) 6,
            ],
            'a list of positive and negative floats' => [
                (float) 1,
                (float) 2,
                (float) -3,
                (float) -6,
            ],
        ];
    }

    /**
     * @testdox multiply a list of floats with
     * @dataProvider get_list_of_floats_with_result_for_multiply
     */
    public function multiply_a_list_of_float($a, $b, $c, $result)
    {
        $math = new Math();
        $math
            ->sum($a)
            ->multiply($b)
            ->multiply($c);
        $this->assertSame($result, $math->getNumber());
    }


    public function get_list_of_floats_with_result_for_divide()
    {
        return [
            'a list of positive floats' => [
                (float) 1,
                (float) 2,
                (float) 3,
                0.17,
            ],
            'a list of positive and negative floats' => [
                (float) 1,
                (float) 2,
                (float) -3,
                -0.17,
            ],
        ];
    }

    /**
     * @testdox divide a list of floats with
     * @dataProvider get_list_of_floats_with_result_for_divide
     */
    public function divide_a_list_of_float($a, $b, $c, $result)
    {
        $math = new Math();
        $math
            ->sum($a)
            ->divide($b)
            ->divide($c);
        $this->assertSame($result, $math->getNumber());
    }

    /**
     * @testdox divide with zero
     * @expectedException App\Tools\DivideByZeroException
     */
    public function divide_by_zero()
    {
        $math = new Math();
        $math
            ->sum((float) 4)
            ->divide(0);
    }
}
