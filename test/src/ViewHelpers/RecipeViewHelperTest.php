<?php

use PHPUnit\Framework\TestCase;


require_once dirname(__FILE__, 4) . '/vendor/autoload.php';

class RecipeViewHelperTest extends TestCase
{

    /**
     * Success test case for generateRecipeHtml() method.
     */
    public function testGenerateRecipeHtmlSuccess()
    {
        $recipe = $this->createMock(\Mamoi\Entities\RecipeEntity::class);
        $recipe->method('getTitle')->willReturn('Cheesy Peas');
        $recipe->method('getHref')->willReturn('https://cookeatshare.com/recipes/best-ever-macaroni-salad-51224');
        $recipe->method('getIngredients')->willReturn('Cheese, Peas');
        $recipe->method('getImg')->willReturn('http://img.recipepuppy.com/769587.jpg');

        $result = \Mamoi\ViewHelpers\RecipeViewHelper::generateRecipeHtml($recipe);

        $expected =  "<div class=\"recipe\"><div class=\"recipeImg\"><img src=\"http://img.recipepuppy.com/769587.jpg\" alt=\"image that may or may not relate to Cheesy Peas\" /></div><div><h4>Cheesy PeasCheesy Peas</h4>Ingredients: Cheese, Peas<a href=\"http://img.recipepuppy.com/769587.jpg\" target=\"_blank\">See Recipe</a></div></div>";

        $this->assertEquals($expected, $result);
    }

    /**
     * Malformed test for generateRecipeHtml() method.
     * We expect an exception when we pass un unexpected data type as a parameter.
     */
    public function testGenerateRecipeHtmlMalformed()
    {
        $this->expectException(TypeError::class);

        $input = 'hello';

        $result = \Mamoi\ViewHelpers\RecipeViewHelper::generateRecipeHtml($input);
    }

}