<?php

use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__, 4) . '/vendor/autoload.php';


class IngredientViewHelperTest extends TestCase {

    public function testGenerateIngredientHtmlSuccess() {

        $ingredient = $this->createMock(IngredientEntity::class);
        $ingredient->id = 2;
        $ingredient->name = 'TESTNAME';

        $result = IngredientViewHelper::generateIngredientHtml($ingredient);

        $expected =  '<div class=\"ingredient\"><label><input type=\"checkbox\" name=\"2\" id=\"TESTNAME\">TESTNAME</label></div>';

        $this->assertEquals($result, $expected);

    }
}
