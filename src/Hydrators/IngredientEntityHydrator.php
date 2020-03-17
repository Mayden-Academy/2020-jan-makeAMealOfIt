<?php


namespace Mamoi\Hydrators;


class IngredientEntityHydrator {
    private $db;

    public function __construct(Db $db) {
        $this->db = $db;
}
    public function getAllIngredientEntities() {
        $query = $this->db->prepare('SELECT `id`, `name` FROM `ingredients`;');
        $query->setFetchMode(PDO::FETCH_CLASS, '../Entities/IngredientEntity');
        $query->execute();
        return $query->fetchAll();
    }
}

