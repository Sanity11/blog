<?php

namespace Patterns\Command\CLICommand;

use Patterns\Command\Parser\CommandParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OrderCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('order')
            ->setDescription('Order functions')
            ->addArgument(
                'execute',
                InputArgument::REQUIRED,
                'What do you wan\'t to do?'
            )
            ->addArgument(
                'argument',
                InputArgument::OPTIONAL,
                'Do you have an argument?'
            )
        ;
    }

    /**
     * Ow yeah, get those arguments and do something with it
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $commandClass = $input->getArgument('execute');
        $argument = $input->getArgument('argument');

        $command = CommandParser::parseCommand($commandClass, [$argument], $output);

        try {

            $command->execute();
        } catch (\Exception $e) {

            $output->writeln('Woops! ' . $e->getMessage() . ' ' . $e->getCode());
        }
    }
}