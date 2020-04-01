<?php

require_once __DIR__ . '/vendor/autoload.php';
use \Mamoi\FormData\FormInputToCurlQuery;
use \Mamoi\Resources\RecipeApiCall;
use \Mamoi\Hydrators\RecipeEntityHydrator;
use \Mamoi\ViewHelpers\RecipeViewHelper;
$getData = [];

if (count($_GET) === 1 && $_GET['userIngredients'] === '') {
    header("location: index.php");
} else {
    $getData = $_GET;
    $apiQuery = FormInputToCurlQuery::createCheckboxQueryUrl($getData);
    $apiResults = RecipeApiCall::createCurl($apiQuery);
    if(count($apiResults) > 0) {
        $allRecipeEntities = RecipeEntityHydrator::getAllRecipeEntities($apiResults);
        $recipeHtml = RecipeViewHelper::displayAllRecipes($allRecipeEntities);
    } else {
        $recipeHtml = "No recipes found.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Make a Meal of It</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet" />
    <link rel='stylesheet' type='text/css' href='normalize.css' />
    <link rel='stylesheet' type='text/css' href='styles.css' />
</head>

<body>
<div class='container'>

    <header>
        <h1>Make a Meal of It</h1>
    </header>

    <div class="back-button">
        <a href="index.php">Back to ingredients</a>
    </div>

    <article>
        <h3>Results:</h3>
        <p>We found these recipes for <span class="ingredients-list"><?php echo str_replace(',', ', ', $apiQuery);?></span></p>
    </article>

    <main>
        <?php echo $recipeHtml;?>
    </main>

</div>
</body>

</html>

