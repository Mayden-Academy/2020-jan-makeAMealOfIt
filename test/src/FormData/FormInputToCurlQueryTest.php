<?php

use PHPUnit\Framework\TestCase;
use Mamoi\FormData\FormInputToCurlQuery;

require_once dirname(__FILE__, 4) . '/vendor/autoload.php';

class FormInputToCurlQueryTest extends TestCase
{
    public function TestFormInputToCurlQuerySuccess()
    {
        $testInput = [
            'onion' => 'on',
            'cheese' => 'on',
            'biscuits' => 'on',
            'fruit' => 'on'
        ];

        FormInputToCurlQuery::createCheckboxQueryUrl($testInput);
    }
}