<?php

namespace Patterns\Tests;

use Patterns\Adapter\Adapter;
use Patterns\Adapter\Client;
use Patterns\Adapter\Component;
use Patterns\Adapter\RequiredIncompatibleComponent;

class AdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testAdapter()
    {
        $requiredIncompatibleComponent = new RequiredIncompatibleComponent();
        $adapter = new Adapter($requiredIncompatibleComponent);
        $result  = $adapter->getStuff();

        $this->assertEquals([
            'this',
            'is',
            'all',
            'I',
            'Need'
        ], $result);
    }

    public function testClientWithCompatibleComponent()
    {
        $component = new Component();
        $client = new Client($component);
        $parsed = $client->parseComponentStuff();
        $unparsed = array_flip($component->getStuff());

        $this->assertEquals($parsed, $unparsed);
    }

    /**
     * @expectedException TypeError
     */
    public function testClientWithIncompatibleComponent()
    {
        $component = new RequiredIncompatibleComponent();
        $client = new Client($component);
    }

    public function testClientWithAdapter()
    {
        $incompatibleComponent = new RequiredIncompatibleComponent();
        $adapter = new Adapter($incompatibleComponent);
        $client = new Client($adapter);
        $unparsed = array_flip($incompatibleComponent->getMeSomeStuff());

        $parsed = $client->parseComponentStuff();

        $this->assertEquals($parsed, $unparsed);
    }
}