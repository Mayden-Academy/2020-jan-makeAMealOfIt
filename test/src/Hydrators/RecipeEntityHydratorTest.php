<?php

use PHPUnit\Framework\TestCase;


require_once dirname(__FILE__, 4) . '/vendor/autoload.php';

class RecipeEntityHydratorTest extends TestCase
{
    /** Success test - takes and example assoc array for two recipes, checks that the return is an array, 2 items long, both are RecipeEntities objects
     *
     */
    public function testSuccessGetAllRecipeEntities()
    {
        $apiResult = [
            [
                "title"=>'After Easter Layered Salad \r\n\t\t\r\n\t\r\n\t\t\r\n\t\r\n\t\r\n\r\n',
                "href"=>'http://www.recipezaar.com/French-Bread-Sausage-Breakfast-Roll-175244',
                "ingredients"=>'sausage',
                "thumbnail"=>'http://img.recipepuppy.com/573680.jpg'
            ],
            [
                "title"=>'Garden Chili Tacos \r\n\t\t\n',
                "href"=>'http:\/\/www.kraftfoods.com\/kf\/recipes\/garden-chili-tacos-57028.aspx',
                "ingredients"=>'ground beef, pepper, chili powder, red kidney beans, corn, green pepper, tomato, taco shells, sour cream',
                "thumbnail"=>'http:\/\/img.recipepuppy.com\/634058.jpg'
            ]
        ];

        $result = \Mamoi\Hydrators\RecipeEntityHydrator::getAllRecipeEntities($apiResult);
        $this->assertInstanceOf(Mamoi\Entities\RecipeEntity::class, $result[0]);
        $this->assertInstanceOf(Mamoi\Entities\RecipeEntity::class, $result[1]);
        $this->assertCount(2, $result);

    }

    /** Failure test for getAllRecipeEntities. Passes a property with a complex data type when string expected. Method should skip the incongruent entity.
     *
     */
    public function testFailureGetAllRecipeEntities()
    {
        $apiResult = [
            [
                "title"=>['After Easter Layered Salad', 'Thing'],
                "href"=>'http://www.recipezaar.com/French-Bread-Sausage-Breakfast-Roll-175244',
                "ingredients"=>'sausage',
                "thumbnail"=>'http://img.recipepuppy.com/573680.jpg'
            ],
            [
                "title"=>'Garden Chili Tacos \r\n\t\t\n',
                "href"=>'http:\/\/www.kraftfoods.com\/kf\/recipes\/garden-chili-tacos-57028.aspx',
                "ingredients"=>'ground beef, pepper, chili powder, red kidney beans, corn, green pepper, tomato, taco shells, sour cream',
                "thumbnail"=>'http:\/\/img.recipepuppy.com\/634058.jpg'
            ]
        ];

        $result = \Mamoi\Hydrators\RecipeEntityHydrator::getAllRecipeEntities($apiResult);
        $this->assertInstanceOf(Mamoi\Entities\RecipeEntity::class, $result[0]);
        $this->assertCount(1, $result);
    }

    /** Malformed test. Passing a scalar data type when array expected
     *
     */
    public function testMalformedGetAllRecipeEntities()
    {
        $this->expectException(TypeError::class);
        $input = 'Recipes';

        $result = \Mamoi\Hydrators\RecipeEntityHydrator::getAllRecipeEntities($input);

    }

}
