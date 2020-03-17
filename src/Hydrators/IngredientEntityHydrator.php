<?php


namespace Mamoi\Hydrators;


class IngredientEntityHydrator {
    private $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
}

    /** Return an Array of objects of the IngredientEntity class hydrated from the db.
     *
     * @return Array
     */
    public function getAllIngredientEntities() : Array {
        $query = $this->db->prepare('SELECT `id`, `name` FROM `ingredients`;');
        $query->setFetchMode(\PDO::FETCH_CLASS, '../Entities/IngredientEntity');
        $query->execute();
        return $query->fetchAll();
    }
}

