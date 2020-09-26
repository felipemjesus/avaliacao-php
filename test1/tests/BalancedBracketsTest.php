<?php

declare(strict_types=1);

namespace Test1;

use PHPUnit\Framework\TestCase;

class BalancedBracketsTest extends TestCase
{
    /**
     * @dataProvider getValidBrackets
     * @param $text
     * @param $valided
     */
    public function testValidBrackets($text, $valided)
    {
        $this->assertEquals($valided, (new BalancedBrackets())->validate($text));
    }

    /**
     * Data provider for {@link BalancedBracketsTest::testValidBrackets()}
     * @return array
     */
    public function getValidBrackets()
    {
        return [
            ['(){}[]', true],
            ['[{()}](){}', true],
            ['[]{()', false],
            ['[{)]', false],
        ];
    }
}