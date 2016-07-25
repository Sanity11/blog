<?php

namespace Patterns\Adapter;

/**
 * Class Component
 * @package Patterns\Adapter
 */
class Component implements Interfaces\CompatibleComponent
{

    public function getStuff()
    {
        return [
            'this',
            'is',
            'not',
            'what',
            'I',
            'Need'
        ];
    }
}