<?php

namespace Mamoi\ViewHelpers;
use \Mamoi\Entities\IngredientEntity;


class IngredientViewHelper
{
    /**
     * Outputs the HTML for all the ingredients
     * @param array $allTheIngredients
     * @return string
     */
    public static function displayAllIngredients(array $allTheIngredients) : string
    {
        $result = '';

        foreach ($allTheIngredients as $ingredient) {
            $result .= self::generateIngredientHtml($ingredient);
        }

        return $result;
    }

    /**
     * Builds the HTML for a single ingredient entity.
     * @param IngredientEntity $ingredient
     * @return string
     */
    public static function generateIngredientHtml (IngredientEntity $ingredient) : string
    {
        $id = $ingredient->getId();
        $name = $ingredient->getName();
        $output = '';

        $output .= "<div>";
        $output .= "<label class=\"ingredient\">";
        $output .= "<input type=\"checkbox\" name=\"" . $name . "\" id=\"" . $name . "\">";
        $output .= ucwords($name);
        $output .= "</label></div>";

        return $output;
    }
}