<?php

namespace Patterns\Command\Command;

use Patterns\Command\Interfaces\Command;

class NullCommand extends AbstractCommand implements Command
{
    public function validate():void {}

    public function execute():void {

        $this->writeln('Command not found');
    }

    public function undo():void {}
}