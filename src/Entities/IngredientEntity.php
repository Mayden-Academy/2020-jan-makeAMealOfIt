<?php


namespace Mamoi\Entities;


class IngredientEntity
{
    private $id;
    private $name;

    /** Getter for id
     *
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /** Getter for name
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

}