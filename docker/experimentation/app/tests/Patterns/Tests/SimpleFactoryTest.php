<?php

namespace Patterns\Tests;

use Patterns\Factory\Cars\AutoBmw;
use Patterns\Factory\Cars\AutoMercedes;
use Patterns\Factory\Controller\CarController;

class SimpleFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testSimpleFactoryController()
    {
        $controller = new CarController();

        $cars = $controller->getCarsFromSimpleFactory();

        $expectedResult = [
            new AutoBmw(),
            new AutoMercedes()
        ];

        $this->assertEquals($cars, $expectedResult);
    }
}