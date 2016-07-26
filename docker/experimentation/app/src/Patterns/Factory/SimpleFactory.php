<?php

namespace Patterns\Factory;

use Patterns\Factory\Interfaces\Auto;
use Patterns\Factory\Interfaces\AutoFactory;

class SimpleFactory implements AutoFactory
{
    private $factory;

    public function __construct(AutoFactory $factory)
    {
        $this->factory = $factory;
    }

    public function createAutomobile():Auto
    {
        return $this->factory->createAutomobile();
    }
}