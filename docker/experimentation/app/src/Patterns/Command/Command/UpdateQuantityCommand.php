<?php

namespace Patterns\Command\Command;

use Patterns\Command\Interfaces\Command;
use Patterns\Command\Interfaces\CommandFactory;

class UpdateQuantityCommand extends AbstractCommand implements Command, CommandFactory
{
    /**
     * @var int $quantity
     */
    private $quantity;

    /**
     * @throws \Exception
     */
    public function validate():void
    {
        if ($this->quantity < 0) {

            throw new \Exception('Missing quantity argument');
        }
    }

    /**
     * Execute
     */
    public function execute():void
    {
        $this->writeln('Updating quantity, was: 4 now it\'s ' . $this->quantity);
    }

    /**
     * Undo
     */
    public function undo():void
    {
        $this->writeln('Undo');
    }

    /**
     * Give a new quantity
     *
     * @param int $quantity
     */
    public function setQuantity(int $quantity):void
    {
        $this->quantity = $quantity;
    }

    /**
     * You probably don't wan't your factory method in the
     * class itself, but for experimentation purpose this is
     * just fine.
     *
     * @return Command
     */
    public function makeCommand():Command
    {
        $quantity = func_get_arg(0);

        $quantityCommand = new UpdateQuantityCommand();
        $quantityCommand->setQuantity(!isset($quantity) ? -1 : $quantity);

        $quantityCommand->validate();

        return $quantityCommand;
    }
}