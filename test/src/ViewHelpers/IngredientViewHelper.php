<?php

use PHPUnit\Framework\TestCase;


require_once dirname(__FILE__, 4) . '/vendor/autoload.php';

class IngredientViewHelperTest extends TestCase {

    /**
     * Success test case for generateIngredientHtml() method.
     */
    public function testGenerateIngredientHtmlSuccess() {

        $ingredient = $this->createMock(\Mamoi\Entities\IngredientEntity::class);
        $ingredient->method('getId')->willReturn('2');
        $ingredient->method('getName')->willReturn('TESTNAME');

        $result = \Mamoi\ViewHelpers\IngredientViewHelper::generateIngredientHtml($ingredient);

        $expected =  '<div class=\"ingredient\"><label><input type=\"checkbox\" name=\"TESTNAME\" id=\"TESTNAME\">TESTNAME</label></div>';

        $this->assertEquals($expected, $result);

    }

    /**
     * Malformed test for generateIngredientHtml() method.
     * We expect an exception when we pass un unexpected data type as a parameter.
     */
    public function testGenerateIngredientHtmlMalformed() {

        $this->expectException(TypeError::class);

        $input = 'hello';

        $result = \Mamoi\ViewHelpers\IngredientViewHelper::generateIngredientHtml($input);

    }

}


