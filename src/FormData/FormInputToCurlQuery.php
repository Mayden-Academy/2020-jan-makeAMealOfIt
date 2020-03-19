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
        foreach ($getData as $key => $item) {
            if (!is_int($key)) {
                $validResults[] = $key;
            }
        }
        return implode(',',$validResults);
    }
}