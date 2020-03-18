<?php


namespace Mamoi\Hydrators;
use Mamoi\Entities\RecipeEntity;


class RecipeEntityHydrator
{

    public static function getAllRecipeEntities(array $apiResponse) : array
    {
        foreach($apiResponse as $recipe) {
            $title = trim($recipe['title']);
            $href = trim($recipe['href']);
            $ingredients = trim($recipe['ingredients']);
            if (trim($recipe['thumbnail']) == '') {
                $thumbnail = __DIR__ . '/img/default_thumbnail.png';
            } else {
                $thumbnail = trim($recipe['thumbnail']);
            }

            $recipeEntity = new RecipeEntity($title, $href, $ingredients, $thumbnail);
            $recipeEntities[] = $recipeEntity;
        }

        return $recipeEntities;
    }


}