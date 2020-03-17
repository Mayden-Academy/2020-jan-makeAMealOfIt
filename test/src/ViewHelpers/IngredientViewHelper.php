<?php

use PHPUnit\Framework\TestCase;


require_once dirname(__FILE__, 4) . '/vendor/autoload.php';

class IngredientViewHelperTest extends TestCase {

    public function testGenerateIngredientHtmlSuccess() {

        $ingredient = $this->createMock(\Mamoi\Entities\IngredientEntity::class);
        $ingredient->method('getId')->willReturn('2');
        $ingredient->method('getName')->willReturn('TESTNAME');

        $result = \Mamoi\ViewHelpers\IngredientViewHelper::generateIngredientHtml($ingredient);

        $expected =  '<div class=\"ingredient\"><label><input type=\"checkbox\" name=\"TESTNAME\" id=\"TESTNAME\">TESTNAME</label></div>';

        $this->assertEquals($expected, $result);

    }

    public function testGenerateIngredientHtmlFailure() {

        $ingredient = $this->createMock(\Mamoi\Entities\IngredientEntity::class);
        $ingredient->method('getId')->willReturn('2');
        $ingredient->method('getName')->willReturn('NOTATEST');

        $result = \Mamoi\ViewHelpers\IngredientViewHelper::generateIngredientHtml($ingredient);

        $expected =  '<div class=\"ingredient\"><label><input type=\"checkbox\" name=\"TESTNAME\" id=\"TESTNAME\">TESTNAME</label></div>';

        $this->assertEquals($expected, $result);

    }

    public function testGenerateIngredientHtmlMalformed() {

        $ingredient = $this->createMock(\Mamoi\Entities\IngredientEntity::class);
        $ingredient->method('getId')->willReturn([34]);
        $ingredient->method('getName')->willReturn([34, 2, 3]);

        $result = \Mamoi\ViewHelpers\IngredientViewHelper::generateIngredientHtml($ingredient);

        $expected =  '<div class=\"ingredient\"><label><input type=\"checkbox\" name=\"TESTNAME\" id=\"TESTNAME\">TESTNAME</label></div>';

        $this->assertEquals($expected, $result);

    }

}


