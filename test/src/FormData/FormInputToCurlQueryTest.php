<?php

use PHPUnit\Framework\TestCase;
use Mamoi\FormData\FormInputToCurlQuery;

require_once dirname(__FILE__, 4) . '/vendor/autoload.php';

class FormInputToCurlQueryTest extends TestCase
{
    public function testFormInputToCurlQuerySuccess()
    {
        $testInput = [
            'onion' => 'on',
            'cheese' => 'on',
            'biscuits' => 'on',
            'fruit' => 'on'
        ];
        $result = FormInputToCurlQuery::createCheckboxQueryUrl($testInput);
        $expected = 'onion,cheese,biscuits,fruit';
        $this->assertEquals($expected, $result);
    }

    public function testFormInputToCurlQueryMalformed()
    {
        $this->expectException(TypeError::class);
        $testInput = "cheese";
        $case = FormInputToCurlQuery::createCheckboxQueryUrl($testInput);
    }

    public function testFormInputToCurlQueryMalformed2()
    {
        $this->expectException(TypeError::class);
        $testInput = 2;
        $case = FormInputToCurlQuery::createCheckboxQueryUrl($testInput);
    }

}