<?php

namespace Patterns\Factory\Cars\AbstractFactory;

use Patterns\Factory\Cars\AutoMercedes;
use Patterns\Factory\Interfaces\AutoAbstractFactory;

class AutoMercedesFactory implements AutoAbstractFactory
{

    public function createBudgetCar()
    {
        $car = new AutoMercedes();
        $car->setCarType('Just a budget mercedes');

        return $car;
    }

    public function createFamilyCar()
    {
        $car = new AutoMercedes();
        $car->setCarType('Just a family mercedes');

        return $car;
    }

    public function createSuperCar()
    {
        $car = new AutoMercedes();
        $car->setCarType('Just a super mercedes');

        return $car;
    }
}