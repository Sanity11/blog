<?php

namespace Patterns\Factory\Controller;

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


}