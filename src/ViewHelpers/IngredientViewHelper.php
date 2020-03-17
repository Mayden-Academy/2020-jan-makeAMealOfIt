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
    static function displayAllIngredients(array $allTheIngredients) {
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
    static function generateIngredientHtml (IngredientEntity $ingredient) {

        $id = $ingredient->getId();
        $name = $ingredient->getName();
        $output = '';

        $output .= '<div class=\"ingredient\">';
        $output .= '<label>';
        $output .= '<input type=\"checkbox\" name=\"' . $name . '\" id=\"' . $name . '\">';
        $output .= $name;
        $output .= '</label></div>';

        return $output;

    }
}