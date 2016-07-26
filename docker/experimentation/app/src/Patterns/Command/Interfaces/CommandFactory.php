<?php

namespace Patterns\Command\Interfaces;

interface CommandFactory
{
    public function makeCommand():Command;
}