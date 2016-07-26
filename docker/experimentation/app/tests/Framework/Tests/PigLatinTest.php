<?php

namespace Framework\Tests;

use Octopus\Experiment\PigLatin;

class PigLatinTest extends \PHPUnit_Framework_TestCase
{
    public function testEnglishToPigLatinWorksCorrectly()
    {
        $word = 'test';
        $expectedResult = 'esttay';

        $pigLatin = new PigLatin();
        $result = $pigLatin->convert($word);

        $this->assertEquals(
            $expectedResult,
            $result,
            'PigLatin conversion did not work correctly'
        );
    }
}