<?php

namespace Patterns\Command\Interfaces;

use Symfony\Component\Console\Output\OutputInterface;

interface Command
{
    public function validate():void;
    public function execute():void;
    public function undo():void;
    public function setCliOutput(OutputInterface $output):void;
}