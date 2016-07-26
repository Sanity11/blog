<?php

namespace Patterns\Factory\Cars;

use Patterns\Factory\Interfaces\Auto;

class AutoMercedes implements Auto
{
    private $type;

    public function startEngine()
    {

        return 'Start: ' . get_class($this) . ' ' . $this->type;
    }

    public function stopEngine()
    {

        return 'Stop: ' . get_class($this) . ' ' . $this->type;
    }

    public function setCarType(string $type)
    {
        $this->type = $type;
    }
}