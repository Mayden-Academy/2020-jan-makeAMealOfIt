<?php


var_dump($_GET);

$ingredients = array_keys($_GET);

echo '<br>';

$ingredientUrlQuery = implode(',',$ingredients);

var_dump($ingredientUrlQuery);