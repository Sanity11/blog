<?php

namespace Patterns\Adapter;

use Patterns\Adapter\Interfaces\IncompatibleComponent;

class Adapter implements Interfaces\CompatibleComponent
{
    private $component;

    public function __construct(IncompatibleComponent $component)
    {
        $this->component = $component;
    }

    public function getStuff()
    {
        return $this->component->getMeSomeStuff();
    }
}