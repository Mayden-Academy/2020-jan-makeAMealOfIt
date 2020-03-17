<?php
namespace Mamoi;
require_once __DIR__ . '/vendor/autoload.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Make a Meal of It</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' type='text/css' href='normalize.css' />
    <link rel='stylesheet' type='text/css' href='styles.css' />
</head>
<body>
<div class='container'>
<header>
<h1>Make a Meal of It</h1>
</header>

<article>
    Wondering what to have for dinner? Make a Meal of It will provide recipes based on the ingredients you have in your store cupboard.
    Tick the ingredients you want to use in your recipe, when done, click <span>Search</span> to find matching recipes.
    Recipes provided by <a href='http://recipepuppy.com' target='_blank'>recipepuppy.com</a>.
</article>

<main>
    <h3>Select your ingredients:</h3>
    <form>
    <div class='ingredients'>

    </div>
        <button>Search</button>
    </form>

</main>

</div>
</body>
</html>
