<?php

namespace Patterns\Tests;

use Patterns\Command\CLICommand\OrderCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\StreamOutput;

class CommandTest extends \PHPUnit_Framework_TestCase
{

    public function testCliCommandUpdateQuantity()
    {
        $output = $this->runCommand('order UpdateQuantity 10');

        $this->assertEquals("Updating quantity, was: 4 now it's 10\n", $output);
    }

    /**
     * Not possible to use expectedException here, use regexp
     */
    public function testCliCommandUpdateQuantityNoQuantity()
    {
        $output = $this->runCommand('order UpdateQuantity');

        $this->assertRegexp('/[Exception]/', $output);
    }

    public function testCliCommandDeleteProduct()
    {
        $output = $this->runCommand('order DeleteProduct');

        $this->assertEquals("Deleting some beautiful product\n", $output);
    }

    public function testCliCommandNonExistingCommand()
    {
        $output = $this->runCommand('order ThisCommandDoesNotExist');

        $this->assertEquals("Command not found\n", $output);
    }

    /**
     * Setup application to mimic a cli, catch output in temp file
     *
     * @param string $command
     * @return string|StreamOutput
     * @throws \Exception
     */
    private function runCommand(string $command)
    {
        $fp = tmpfile();
        $input = new StringInput($command);
        $output = new StreamOutput($fp);

        $application = new Application();
        $application->setAutoExit(false);

        $application->add(new OrderCommand());
        $application->run($input, $output);

        fseek($fp, 0);
        $output = '';
        while (!feof($fp)) {
            $output = fread($fp, 4096);
        }
        fclose($fp);

        return $output;
    }
}