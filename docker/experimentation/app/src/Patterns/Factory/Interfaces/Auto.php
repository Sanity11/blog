<?php

namespace Patterns\Factory\Interfaces;

interface Auto
{
    public function startEngine();
    public function stopEngine();
    public function setCarType(string $type);
}