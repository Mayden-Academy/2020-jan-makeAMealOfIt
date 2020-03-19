<?php

use PHPUnit\Framework\TestCase;

require_once  dirname(__FILE__, 4) . '/vendor/autoload.php';

class RecipeEntityTest extends TestCase
{

    /**
     *  Success test case for recipe entity constructor.
     *  Must generate an instance of the recipe class entity when given correct data-types
     */
    public function testConstructorRecipeEntitySuccess()
    {
        $title = 'test-title';
        $href = 'test-href';
        $ingredients = 'test-ingredients';
        $thumbnail = 'test-thumbnail';

        $recipe = new \Mamoi\Entities\RecipeEntity($title, $href, $ingredients, $thumbnail);
        $this->assertInstanceOf(\Mamoi\Entities\RecipeEntity::class, $recipe);
    }

    /**
     *  Malformed test case
     *  Expecting an exception when passed an unexpected data type as parameter
     */
    public function testConstructorRecipeEntityMalformed()
    {
        $title = [];
        $href = 'test-href';
        $ingredients = 'test-ingredients';
        $thumbnail = 'test-thumbnail';

        $this->expectException(TypeError::class);
        $recipe = new \Mamoi\Entities\RecipeEntity($title, $href, $ingredients, $thumbnail);
    }
}