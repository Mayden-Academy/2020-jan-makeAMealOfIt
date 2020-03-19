<?php

use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__, 4) . '/vendor/autoload.php';

class ValidatorTest extends TestCase
{
    /** Success test case for trimming spaces at start and end
     *
     */
    public function testSuccessTrimFormSearchInput() {
        $input = '     test     ';
        $expected = 'test';
        $case = Mamoi\Validators\Validator::trimFormSearchInput($input);
        $this->assertEquals($expected, $case);
    }

    /** Malformed test case for trimming spaces at start and end
     *
     */
    public function testMalformedTrimFormSearchInput() {
        $input = [];
        $this->expectException(TypeError::class);
        $case = Mamoi\Validators\Validator::trimFormSearchInput($input);
    }

    /** Success test case for getting rid of special chars
     *
     */
    public function testSuccessSanitiseFormSearchInput() {
        $input = 'onion324 garlic@@ pizza@&*%$(<><><><';
        $expected = 'onion garlic pizza';
        $case = Mamoi\Validators\Validator::sanitiseFormSearchInput($input);
        $this->assertEquals($expected, $case);
    }

    /** Malformed test case passing an array when a string is expected
     *
     */
    public function testMalformedSanitiseFormSearchInput() {
        $input = [];
        $this->expectException(TypeError::class);
        $case = Mamoi\Validators\Validator::sanitiseFormSearchInput($input);
    }

    /** Success test case for removing extra spaces between words
     *
     */
    public function testSuccessFormatFormSearchInput() {
        $input = 'onion     garlic       cheese';
        $expected = 'onion garlic cheese';
        $case = Mamoi\Validators\Validator::formatFormSearchInput($input);
        $this->assertEquals($expected, $case);
    }

    /** Malformed test case for passing array when expecting a string
     *
     */
    public function testMalformedFormatFormSearchInput() {
        $input = [];
        $this->expectException(TypeError::class);
        $case = Mamoi\Validators\Validator::formatFormSearchInput($input);
    }
}