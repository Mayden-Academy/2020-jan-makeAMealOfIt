<?php
require_once __DIR__ . '/vendor/autoload.php';

use \Mamoi\Resources\Db;
use \Mamoi\Hydrators\IngredientEntityHydrator;

$db = new Db();
$connection = $db->getConnection();
$ingredientHydrator = new IngredientEntityHydrator($connection);
$allIngredients = $ingredientHydrator->getAllIngredientEntities();