<?php

namespace Patterns\Adapter;

use Patterns\Adapter\Interfaces\CompatibleComponent;

/**
 * This client
 * @package Patterns\Adapter
 */
class Client
{
    private $component;

    /**
     * Client constructor.
     * @param CompatibleComponent $component
     */
    public function __construct(CompatibleComponent $component)
    {
        $this->component = $component;
    }

    /**
     * Component stuff.
     * @return mixed
     */
    public function parseComponentStuff()
    {
        $stuff = $this->component->getStuff();

        return array_flip($stuff);
    }
}