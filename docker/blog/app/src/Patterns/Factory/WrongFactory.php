<?php

namespace Patterns\Factory;

use Patterns\Factory\Cars\AutoBmw;
use Patterns\Factory\Cars\AutoMercedes;
use Patterns\Factory\Interfaces\Auto;

class WrongFactory
{
    const BMW = 'bmw';
    const MERCEDES = 'mercedes';

    /**
     * @param string $name
     * @return Auto
     * @throws \Exception
     */
    static public function getCar(string $name):Auto
    {
        switch ($name) {

            case 'bmw':

                $car = new AutoBmw();
                break;

            case 'mercedes';

                $car = new AutoMercedes();
                break;

            default:

                $car = null;
                break;
        }

        if (isset($car)) {
            return $car;
        }

        throw new \Exception('Car not found');
    }
}