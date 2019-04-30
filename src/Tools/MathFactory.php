<?php


namespace App\Tools;

class MathFactory implements MathFactoryInterface
{
    /** @var string */
    private $className;

    public function __construct(string $className)
    {
        $this->className = $className;
    }

    public function getInstance(): MathInterface
    {
        return new $this->className;
    }
}
