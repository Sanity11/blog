<?php

namespace Patterns\Command\Parser;

use Patterns\Command\Interfaces\Command;
use Patterns\Command\Command\NullCommand;
use Symfony\Component\Console\Output\OutputInterface;

class CommandParser
{
    public static function parseCommand(
        string $name,
        array $arguments = null,
        OutputInterface $output = null
    ):Command {

        $class = 'Patterns\Command\Command\\' . $name . 'Command';

        if (class_exists($class)) {

            $command = new $class();

            if (isset($arguments)) {

                $command = $command->makeCommand($arguments[0]);
            } else {

                $command = $command->makeCommand();
            }
        } else {

            $command = new NullCommand();
        }

        if (isset($output)) {

            $command->setCliOutput($output);
        }

        return $command;
    }
}