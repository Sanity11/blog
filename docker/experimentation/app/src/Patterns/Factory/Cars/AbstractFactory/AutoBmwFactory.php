<?php

namespace Patterns\Factory\Cars\AbstractFactory;
use Patterns\Factory\Cars\AutoBmw;
use Patterns\Factory\Interfaces\AutoAbstractFactory;

class AutoBmwFactory implements AutoAbstractFactory
{

    public function createBudgetCar()
    {

        $car = new AutoBmw();
        $car->setCarType('Just a budget car');

        return $car;
    }

    public function createFamilyCar()
    {

        $car = new AutoBmw();
        $car->setCarType('Just a family car');

        return $car;
    }

    public function createSuperCar()
    {

        $car = new AutoBmw();
        $car->setCarType('Just a supercar');

        return $car;
    }
}