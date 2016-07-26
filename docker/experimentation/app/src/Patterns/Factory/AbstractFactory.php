<?php

namespace Patterns\Factory;

use Patterns\Factory\Interfaces\AutoAbstractFactory;

class AbstractFactory implements AutoAbstractFactory
{
    private $factory;

    public function __construct(AutoAbstractFactory $factory)
    {
        $this->factory = $factory;
    }

    public function createBudgetCar()
    {
        return $this->factory->createBudgetCar();
    }

    public function createFamilyCar()
    {
        return $this->factory->createFamilyCar();
    }

    public function createSuperCar()
    {
        return $this->factory->createSuperCar();
    }
}