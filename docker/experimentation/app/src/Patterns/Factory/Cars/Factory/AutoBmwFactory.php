<?php

namespace Patterns\Factory\Cars\Factory;

use Patterns\Factory\Cars\AutoBmw;
use Patterns\Factory\Interfaces\Auto;
use Patterns\Factory\Interfaces\AutoFactory;

class AutoBmwFactory implements AutoFactory
{

    public function createAutomobile():Auto
    {
        return new AutoBmw();
    }
}