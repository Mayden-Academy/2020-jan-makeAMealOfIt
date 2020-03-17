<?php

namespace Mamoi\Entities;

class IngredientViewHelper
{
    static function displayAllIngredients(array $allTheIngredients) {
        $result = '';

        foreach ($allTheIngredients as $ingredient) {
            $result .= self::generateIngredientHtml($ingredient);
        }

        return $result;
    }

    static function generateIngredientHtml (IngredientEntity $ingredient) {

        $id = $ingredient->getId();
        $name = $ingredient->getName();

        return
        '<div class=\"ingredient\">
            <label>
            <input type=\"checkbox\" name=\"' . $id . '\" id=\"' . $name . '\">'
                . $name . '
            </label>
        </div>';

    }
}