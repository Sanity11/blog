<?php

namespace Patterns\Factory\Cars\Factory;

use Patterns\Factory\Cars\AutoMercedes;
use Patterns\Factory\Interfaces\Auto;
use Patterns\Factory\Interfaces\AutoFactory;

class AutoMercedesFactory implements AutoFactory
{

    public function createAutomobile():Auto
    {
        return new AutoMercedes();
    }
}