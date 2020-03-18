<?php

namespace Mamoi\Resources;

class RecipeApiCall {

    /**Initialises curl Request and fetches an assoc array from the http://www.recipepuppy.com API
     *
     * @param string $url which is created when user selects and submits items from then ingredients list
     *
     * @return array of results from the recipepuppy API with a list of meals
     */
    public static function createCurl(string $query) : array
    {
        $url = 'http://www.recipepuppy.com/api/?i=' . $query ;
        $curlRequest = curl_init();
        curl_setopt($curlRequest, CURLOPT_URL, $url);
        curl_setopt($curlRequest, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curlRequest);
        $result = json_decode($output, true);
        curl_close($curlRequest);
        return $result['results'];

    }
}


