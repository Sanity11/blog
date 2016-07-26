<?php

namespace Patterns\Command\Command;

use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractCommand
{
    /**
     * @var OutputInterface $output
     */
    private $output;

    /**
     * Only write lines if we can
     *
     * @param string $message
     */
    protected function writeln(string $message):void
    {
        if (isset($this->output)) {

            $this->output->writeln($message);
        }
    }

    /**
     * @param OutputInterface $output
     */
    public function setCliOutput(OutputInterface $output):void
    {
        $this->output = $output;
    }
}