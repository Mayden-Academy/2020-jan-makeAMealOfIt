<?php
require_once __DIR__ . '/vendor/autoload.php';

use \Mamoi\Resources\Db;

$db = new Db();
$connection = $db->getConnection();
