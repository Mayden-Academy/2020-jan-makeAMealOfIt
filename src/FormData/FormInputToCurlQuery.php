<?php

namespace Mamoi\FormData;
use \Mamoi\Validators\Validator;

class FormInputToCurlQuery
{
    /**
     * Change checkbox ingredient data into a comma separated string to be added to api curl request
     *
     * @param array $getData
     *
     * @return string $ingredientUrlQuery
     */
    public static function createCheckboxQueryUrl(array $getData) : string {
        $validResults = [];
        $searchInput = '';
        foreach ($getData as $key => $item) {
            if (!is_int($key)) {
                if ($key == 'userIngredients') {
                    $searchInput = Validator::validateString($item);
                    $searchInput = self::formatSearchInput($searchInput);
                } elseif ($key != 'userIngredients') {
                    $validResults[] = $key;
                } else {
                    $validResults = [];
                }
            }
        }

        return (implode(',',$validResults)) . ',' . $searchInput;
    }

    public static function formatSearchInput ($validatedInput)
    {
        return str_replace(' ', ',',  $validatedInput);
    }

    public static function trim ($arrayItem)
    {
        return trim($arrayItem);
    }
}