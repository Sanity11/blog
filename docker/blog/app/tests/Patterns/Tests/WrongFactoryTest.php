<?php

namespace Patterns\Tests;

use Patterns\Factory\Cars\AutoBmw;
use Patterns\Factory\Cars\AutoMercedes;
use Patterns\Factory\Controller\CarController;
use Patterns\Factory\WrongFactory;

class WrongFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testWrongFactoryController()
    {
        $controller = new CarController();

        $result = $controller->getCarsFromWrongFactory();

        $augmentedResult = [
            new AutoBmw(),
            new AutoMercedes()
        ];

        $this->assertEquals(
            $result,
            $augmentedResult
        );
    }

    /**
     * @expectedException Exception
     */
    public function testWrongFactoryInvalidParameter()
    {
        WrongFactory::getCar('mitsubishi');
    }

    public function testWrongFactoryBmw()
    {
        $bmw = WrongFactory::getCar(WrongFactory::BMW);

        $this->assertEquals(new AutoBmw(), $bmw);
    }
}