<?php

namespace Mamoi\FormData;

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
                if ($key == 'searchInput') {
                    $searchInput = $item; //call validator as necessary
                } else {
                $validResults[] = $key;
                }
            }
        }
        return implode(',',$validResults) . ',' . $searchInput;
    }

    public static function formatSearchInput ($validatedInput)
    {
        $validatedInput = explode(' ', $validatedInput);
        $trimmedArray = array_walk ($validatedInput, 'trim');
        $validatedInput = implode (',', $trimmedArray);
    }

    public static function trim ($arrayItem)
    {
        return trim($arrayItem);
    }
}