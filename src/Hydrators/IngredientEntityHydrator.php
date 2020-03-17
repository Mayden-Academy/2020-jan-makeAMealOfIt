<?php


namespace Mamoi\Hydrators;


class IngredientEntityHydrator {
    private $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
}

    /** Return an Array of objects of the IngredientEntity class hydrated from the db.
     *
     * @return array
     */
    public function getAllIngredientEntities() : array {
        $query = $this->db->prepare('SELECT `id`, `name` FROM `ingredients`;');
        $query->setFetchMode(\PDO::FETCH_CLASS, 'Mamoi\Entities\IngredientEntity');
        $query->execute();
        return $query->fetchAll();
    }
}

