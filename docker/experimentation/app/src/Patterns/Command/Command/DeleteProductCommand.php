<?php

namespace Patterns\Command\Command;

use Patterns\Command\Interfaces\Command;
use Patterns\Command\Interfaces\CommandFactory;

class DeleteProductCommand extends AbstractCommand implements Command, CommandFactory
{

    public function validate():void
    {
        // TODO: Implement validate() method.
    }

    public function execute():void
    {
        $this->writeln('Deleting some beautiful product');
    }

    public function undo():void
    {
        // TODO: Implement undo() method.
    }

    public function makeCommand():Command
    {
        return new DeleteProductCommand();
    }
}