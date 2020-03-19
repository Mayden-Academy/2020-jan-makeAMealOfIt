<?php

namespace Mamoi\ViewHelpers;
use \Mamoi\Entities\RecipeEntity;


class RecipeViewHelper
{
    /**
     * Outputs the HTML for all the recipes
     * @param array $allTheRecipes - the recipes passed from an api request
     * @return string - the HTML to display for all recipes
     */
    public static function displayAllRecipes(array $allTheRecipes) : string
    {
        $result = '';

        foreach ($allTheRecipes as $recipe) {
            $result .= self::generateRecipeHtml($recipe);
        }

        return $result;
    }

    /**
     * Builds the HTML for a single recipe entity
     * @param RecipeEntity $recipe - the recipe entity passed from the displayAllRecipes function
     * @return string - the HTML to display for the single recipe entity
     */
    public static function generateRecipeHtml (RecipeEntity $recipe) : string
    {
        $title = $recipe->getTitle();
        $href = $recipe->getHref();
        $ingredients = $recipe->getIngredients();
        $img = $recipe->getThumbnail();

        $output = "<div class=\"recipe\">";
        $output .= "<img src=\"$img\" alt=\"$title\" />";
        $output .= "<div><h4>$title</h4>Ingredients: $ingredients";
        $output .= "<a href=\"$href\" target=\"_blank\">See Recipe</a></div>";
        $output .= "</div>";

        return $output;
    }
}