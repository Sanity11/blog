<?php

namespace Patterns\Factory\Interfaces;

interface AutoAbstractFactory
{
    public function createBudgetCar();
    public function createFamilyCar();
    public function createSuperCar();
}