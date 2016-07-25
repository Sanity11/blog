<?php

namespace Patterns\Factory\Cars;

use Patterns\Factory\Interfaces\Auto;

class AutoBmw implements Auto
{

    public function startEngine()
    {

        return 'Start: ' . get_class($this);
    }

    public function stopEngine()
    {

        return 'Stop: ' . get_class($this);
    }
}