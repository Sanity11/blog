<?php

namespace Patterns\Tests;

use Patterns\Factory\Cars\AbstractFactory\AutoBmwFactory;
use Patterns\Factory\Cars\AbstractFactory\AutoMercedesFactory;
use Patterns\Factory\Cars\AutoBmw;
use Patterns\Factory\Controller\CarController;

class AbstractFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testAbstractFactoryController()
    {
        $controller = new CarController();

        $cars = $controller->getCarsFromAbstractFactory();

        $bmwFactory = new AutoBmwFactory();
        $bmwBudget = $bmwFactory->createBudgetCar();
        $bmwFamily = $bmwFactory->createFamilyCar();
        $bmwSuper = $bmwFactory->createSuperCar();

        $mercedesFactory = new AutoMercedesFactory();
        $mercedesBudget = $mercedesFactory->createBudgetCar();
        $mercedesFamily = $mercedesFactory->createFamilyCar();
        $mercedesSuper = $mercedesFactory->createSuperCar();

        $expectedCars = [
            $bmwBudget, $bmwFamily, $bmwSuper,
            $mercedesBudget, $mercedesFamily, $mercedesSuper
        ];

        $this->assertEquals($cars, $expectedCars);
    }

    public function testBmwFactory()
    {
        $bmwFactory = new AutoBmwFactory();
        $bmwBudget = $bmwFactory->createBudgetCar();
        $bmwFamily = $bmwFactory->createFamilyCar();
        $bmwSuper = $bmwFactory->createSuperCar();

        $bmwBudgetExpected = new AutoBmw();
        $bmwBudgetExpected->setCarType('Just a budget car');

        $bmwFamilyExpected = new AutoBmw();
        $bmwFamilyExpected->setCarType('Just a family car');

        $bmwSuperExpected = new AutoBmw();
        $bmwSuperExpected->setCarType('Just a supercar');

        $this->assertEquals(
            [$bmwBudget, $bmwFamily, $bmwSuper],
            [$bmwBudgetExpected, $bmwFamilyExpected, $bmwSuperExpected]
        );
    }
}

