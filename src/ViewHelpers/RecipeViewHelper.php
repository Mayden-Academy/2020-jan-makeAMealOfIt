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
        $title = $recipe->title;
        $href = $recipe->href;
        $ingredients = $recipe->ingredients;
        $img = $recipe->img;

        $output = "<div class=\"recipe\">";
        $output .= "<img src=\"$img\" alt=\"image that may or may not relate to $title\" />";
        $output .= "<h4>$title</h4>";
        $output .= "<div>$ingredients</div>";
        $output .= "<a href=\"$href\" target=\"_blank\">$href</a>";
        $output .="</div>";

        return $output;
    }
}