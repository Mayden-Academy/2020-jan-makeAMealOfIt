<?php


namespace Mamoi\Hydrators;
use Mamoi\Entities\RecipeEntity;


class RecipeEntityHydrator
{

    /** Hydrates Api json data into RecipeEntity objects
     *
     * @param array $apiResponse Takes assoc array decoded from json
     * @return array Returns array of RecipeEntity objects
     */
    public static function getAllRecipeEntities(array $apiResponse) : array
    {
        $recipeEntities = [];

        foreach($apiResponse as $recipe) {
            if (is_string($recipe['title'])
                && is_string($recipe['href'])
                && is_string($recipe['ingredients'])
                && is_string($recipe['thumbnail'])) {

                $title = trim($recipe['title']);
                $href = trim($recipe['href']);
                $ingredients = trim($recipe['ingredients']);

                if (trim($recipe['thumbnail']) == '') {
                    $thumbnail = 'img/default_thumbnail.png';
                } else {
                    $thumbnail = trim($recipe['thumbnail']);
                }

                $recipeEntity = new RecipeEntity($title, $href, $ingredients, $thumbnail);
                $recipeEntities[] = $recipeEntity;
            }
        }

        return $recipeEntities;
    }

}