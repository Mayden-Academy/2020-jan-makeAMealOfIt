<?php


namespace Mamoi\Hydrators;
use Mamoi\Entities\RecipeEntity;


class RecipeEntityHydrator
{

    public static function getAllRecipeEntities(\stdClass $apiResponse) : array
    {
        $recipes = $apiResponse->results;
        foreach($recipes as $recipe) {
            $title = trim($recipe->title);
            $href = trim($recipe->href);
            $ingredients = trim($recipe->ingredients);
            $thumbnail = trim($recipe->thumbnail);

            $recipeEntity = new RecipeEntity($title, $href, $ingredients, $thumbnail);
            $recipeEntities[] = $recipeEntity;
        }

        return $recipeEntities;
    }


}