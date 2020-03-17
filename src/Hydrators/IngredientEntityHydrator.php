<?php

class IngredientEntityHydrator {
    private $db;
    public function __construct(PDO $db) {
        $this->db = $db;
}
    public static function getAllIngredientEntities() {
        $query = $this->db->prepare('SELECT `id`, `name` FROM `ingredients`;');
        $query->setFetchMode(PDO::FETCH_CLASS, '../IngredientEntity');
        $query->execute();
        return $query->fetchAll();
    }
}

IngredientEntityHydrator::getAllIngredientEntities();