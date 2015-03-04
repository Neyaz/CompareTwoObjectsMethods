<?php

namespace CompareObjects\Tests;

use CompareObjects\CompareTwoObjects;

include "../CompareObjects.php";
include "../Tests/TestObjectNumberOne.php";
include "../Tests/TestObjectNumberTwo.php";

class CompareObjectsTest extends \PHPUnit_Framework_TestCase
{
    public function testTwoObjects()
    {
        $equals = [
            'HellOWorld',
            'FizZBuzz'
        ];
        $this->assertEquals((new CompareTwoObjects())->CompereObjects(new TestObjectNumberOne(), new TestObjectNumberTwo()), $equals);
    }
} 