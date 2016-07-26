<?php

namespace Patterns\Factory\Controller;

use Patterns\Factory\AbstractFactory;
use Patterns\Factory\Cars\Factory\AutoBmwFactory;
use Patterns\Factory\Cars\Factory\AutoMercedesFactory;
use Patterns\Factory\SimpleFactory;
use Patterns\Factory\WrongFactory;

class CarController
{

    /**
     * Literally this may use a factory, but a
     * factory that will give you a headache.
     */
    public function getCarsFromWrongFactory()
    {

        $bmw = WrongFactory::getCar(WrongFactory::BMW);
        $mercedes = WrongFactory::getCar(WrongFactory::MERCEDES);

        return [
            $bmw, $mercedes
        ];
    }

    /**
     * This simple factory allows for configuration by
     * passing in a sub factory. Also it's not aware of
     * the cars that can be created. Adheres to the open / closed
     * principle.
     */
    public function getCarsFromSimpleFactory()
    {

        $factory = new SimpleFactory(new AutoBmwFactory());
        $bmw = $factory->createAutomobile();

        $factory = new SimpleFactory(new AutoMercedesFactory());
        $mercedes = $factory->createAutomobile();

        return [
            $bmw,
            $mercedes
        ];
    }

    /**
     * Very much like the simple factory, more
     * return options to it.
     */
    public function getCarsFromAbstractFactory()
    {

        $factory = new AbstractFactory(new \Patterns\Factory\Cars\AbstractFactory\AutoBmwFactory());
        $bmwBudget = $factory->createBudgetCar();
        $bmwFamily = $factory->createFamilyCar();
        $bmwSuper = $factory->createSuperCar();

        $factory = new AbstractFactory(new \Patterns\Factory\Cars\AbstractFactory\AutoMercedesFactory());
        $mercedesBudget = $factory->createBudgetCar();
        $mercedesFamily = $factory->createFamilyCar();
        $mercedesSuper = $factory->createSuperCar();

        return [
            $bmwBudget, $bmwFamily, $bmwSuper,
            $mercedesBudget, $mercedesFamily, $mercedesSuper
        ];
    }
}