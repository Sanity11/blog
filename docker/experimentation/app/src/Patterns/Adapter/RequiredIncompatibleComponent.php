<?php

namespace Patterns\Adapter;

class RequiredIncompatibleComponent implements Interfaces\IncompatibleComponent
{
    public function getMeSomeStuff()
    {
        return [
            'this',
            'is',
            'all',
            'I',
            'Need'
        ];
    }
}