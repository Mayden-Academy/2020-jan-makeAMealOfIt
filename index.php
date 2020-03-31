<?php

require_once __DIR__ . '/vendor/autoload.php';
use \Mamoi\Resources\Db;
use \Mamoi\Hydrators\IngredientEntityHydrator;

$db = new Db();
$connection = $db->getConnection();
$ingredientHydrator = new IngredientEntityHydrator($connection);
$allIngredients = $ingredientHydrator->getAllIngredientEntities();

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

        <article>
            <p>Wondering what to have for dinner?</p>
            <p>Make a Meal of It will provide recipes based on the ingredients you have in your store cupboard.
                Tick the ingredients you want to use in your recipe, when done, click <span>SEARCH</span> to find matching recipes.</p>
            <p>Recipes provided by <a href='http://recipepuppy.com' target='_blank'>recipepuppy.com</a>.</p>
        </article>

        <main>
            <h3>Select your ingredients:</h3>
            <form method='get' action='recipe.php'>
                <div class='ingredients'>
                    <?php
                    echo \Mamoi\ViewHelpers\IngredientViewHelper::displayAllIngredients($allIngredients);
                    ?>
                </div>
                <h3>Add your own:</h3>
                <input type="text" placeholder="Enter ingredients separated by a space" name="userIngredients" id="userIngredients" maxlength="255" />
                <input class="submit" type="submit" value="search" />
            </form>
        </main>

    </div>
</body>

</html>