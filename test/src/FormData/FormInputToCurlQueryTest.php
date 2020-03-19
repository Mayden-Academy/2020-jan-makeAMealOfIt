<?php

use PHPUnit\Framework\TestCase;
use Mamoi\FormData\FormInputToCurlQuery;

require_once dirname(__FILE__, 4) . '/vendor/autoload.php';

class FormInputToCurlQueryTest extends TestCase
{
    /**
     * success test takes an assoc array and outputs a string as a comma separated list of the array keys
     */
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

    /**
     * failure test passing in an array with both indexed and assoc items
     */
    public function testFormInputToCurlQueryFailure()
    {
        $testInput = [
            'one' => 'thing',
            'two',
            'three' => 'thing2'
        ];
        $result = FormInputToCurlQuery::createCheckboxQueryUrl($testInput);
        $expected = 'one,three';
        $this->assertEquals($expected, $result);
    }

    /**
     * malformed test passing in a string when expecting an array
     */
    public function testFormInputToCurlQueryMalformed()
    {
        $this->expectException(TypeError::class);
        $testInput = "cheese";
        $case = FormInputToCurlQuery::createCheckboxQueryUrl($testInput);
    }

    /**
     * malformed test passing in an int when expecting array
     */
    public function testFormInputToCurlQueryMalformed2()
    {
        $this->expectException(TypeError::class);
        $testInput = 2;
        $case = FormInputToCurlQuery::createCheckboxQueryUrl($testInput);
    }
}